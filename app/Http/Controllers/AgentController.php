<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\CentreEnrolement;
use App\Rules\CustomRuleForMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginMail;
use App\Rules\CustomRule;


class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::with('centreEnrolement')->where('idRegion', auth()->user()->idRegion)->where('exist', 1)->get();

        $agentRegion = Agent::with('region')->where('idAgent', auth()->user()->idAgent)->get();

        return response()->view('agentsViews.agentsListForAdminRegion', compact('agents', 'agentRegion'));
    }

    public function searchAgent(Request $request)
    {

        $search = $request->search;

        $agents = Agent::with('centreEnrolement')
            ->where(function ($query) use ($search) {
                $query->where('idAgent', 'LIKE', '%' . $search . '%')
                    ->orWhere('nom', 'LIKE', '%' . $search . '%')
                    ->orWhere('prenom', 'LIKE', '%' . $search . '%')
                    ->orWhere('mail', 'LIKE', '%' . $search . '%');
            })
            ->where('idRegion', auth()->user()->idRegion)
            ->where('exist', 1)
            ->get();


        $agentRegion = Agent::with('region')->where('idAgent', auth()->user()->idAgent)->get();

        return response()->view('agentsViews.agentsListForAdminRegion', compact('agents', 'agentRegion', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $centresEnrolement = CentreEnrolement::where('idRegion', auth()->user()->idRegion)->get();
        return response()->view('agentsViews.addAgent', compact('centresEnrolement'));
    }

    private function isConnectedToInternet()
    {
        $host = 'www.google.com'; // ou tout autre serveur distant
        $port = 80; // port HTTP

        $fp = @fsockopen($host, $port, $errno, $errstr, 10);

        if ($fp) {
            fclose($fp);
            return true;
        } else {
            return false;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(Request $request)
    {
        $connected = $this->isConnectedToInternet();

        $centreEnrolement = $request->input('centreEnrolement'); // c'est comme ça on recupere les valeurs d'un dropdown

        $client = new \GuzzleHttp\Client([
            'verify' => storage_path('app/cacert.pem')  // Chemin vers le fichier cacert.pem
        ]);

        $request->validate([
            'nom' => 'required|string|min:3|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'prenom' => 'required|string|min:3|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|',
            'mail' => ['required', 'email', 'max:255', 'unique:agents,mail', new CustomRuleForMail($client)],
            'tel1' => ['nullable', 'string', 'min:8', 'max:15', 'unique:agents,telephone', new CustomRule($client)],
            //            'centreEnrolement' => 'required|string',
            'adresse' => 'required|string|min:3|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|',
        ]);

        $admin = $request->has('Admin');

        $CE = CentreEnrolement::where('nom', $centreEnrolement);

        $mdp = Uuid::uuid4();
        $mdp_int = hexdec(substr($mdp, 0, 16));
        $mdpString = (string) $mdp_int;



        try {

            if($connected){

                Agent::create(
                    [
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'mail' => $request->mail,
                        'mdp' => bcrypt($mdpString),
                        'telephone' => $request->tel1,
                        'idCentre' => $CE->first()->idCentre,
                        'idRegion' => auth()->user()->idRegion,
                        'isAdmin' => $admin ? true : false,
                        'domicile' => $request->adresse,
                        'exist' => 1,
                    ]
                );
    
                Mail::to($request->mail)->send(new LoginMail($mdpString, $request->nom));
    
                notify()->success('Utilisateur enregistré avec succès! Il est formellement exigé à tout agent de changer son mot de passe dès sa première connexion', 'Succès');
    
                return redirect()->back();

            }else{
                throw new \Exception('Pas de connexion internet !');
            }
            
        } catch (\Exception $e) {
            // Log the error or handle it as per your needs
            report($e);

            notify()->error('L\'enregistrement de l\'utilisateur a échoué. ' . $e->getMessage() . '.', 'Erreur');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function editPass()
    {
        $id = auth()->user()->idAgent;
        $agent = Agent::findOrFail($id);
        return view('agentsViews.editAgentPassword', compact('agent'));
    }

    public function updatePass(Request $request)
    {

        $id = auth()->user()->idAgent;
        $request->validate([
            'mdp' => 'required|string|min:8|confirmed',
        ]);

        try {

            $agent = Agent::findOrFail($id);

            $agent->update(
                [
                    'mdp' => bcrypt($request->mdp),
                ]
            );


            notify()->success('Nouveau mot de passe enregistré avec succès', 'Succès');

            return redirect()->route('home');
        } catch (\Exception $e) {
            // Log the error or handle it as per your needs
            report($e);

            notify()->error('L\'enregistrement du mot de passe a échoué. ' + $e->getMessage() + '.', 'Erreur');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function edit($id)
    {
        $centresEnrolement = CentreEnrolement::where('idRegion', auth()->user()->idRegion)->get();
        $agent = Agent::findOrFail($id);
        return view('agentsViews.editAgent', compact('agent', 'centresEnrolement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $centreEnrolement = $request->input('centreEnrolement'); // c'est comme ça on recupere les valeurs d'un dropdown

        $request->validate([
            'nom' => 'required|string|min:3|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'prenom' => 'required|string|min:3|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'mail' => 'required|email|max:255|unique:agents,mail',
            'tel1' => 'required|min:8|max:8|unique:agents,telephone',
            //            'centreEnrolement' => 'required|string',
            'adresse' => 'required|string|min:3|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
        ]);

        $admin = $request->has('Admin');

        $CE = CentreEnrolement::where('nom', $centreEnrolement);

        try {

            $agent = Agent::findOrFail($id);

            $agent->update(
                [
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'mail' => $request->mail,
                    'telephone' => $request->tel1,
                    'domicile' => $request->adresse,
                    'idCentre' => $CE->first()->id,
                    'isAdmin' => $admin ? true : false,
                ]
            );
            // Agent::create(
            //     [
            //         'nom' => $request->nom,
            //         'prenom' => $request->prenom,
            //         'mail' => $request->mail,
            //         'mdp' => bcrypt($request->tel1),
            //         'telephone' => $request->tel1,
            //         'idCentre' => $CE->first()->idCentre,
            //         'idRegion' => auth()->user()->idRegion,
            //         'isAdmin' => $admin ? true : false,
            //         'domicile' => $request->adresse,
            //     ]
            // );

            notify()->success('Agent modifié avec succès!', 'Succès');

            return redirect()->back();
        } catch (\Exception $e) {
            // Log the error or handle it as per your needs
            report($e);

            notify()->error('La modification de l\'agent a échoué. ' + $e->getMessage() + '.', 'Erreur');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $agent = Agent::findOrFail($id);
            $agent->update(
                [
                    'exist' => 0
                ]
            );
            notify()->success('Agent supprimé avec succès!', 'Succès');
            return redirect()->route('agents.index')->with('success', 'Agent supprimé avec succès.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Gestion des erreurs de requête SQL (base de données hors ligne, etc.)
            notify()->error('Erreur de base de données: ' . $e->getMessage(), 'Erreur');
            return redirect()->back()->with('error', 'Erreur de base de données: Impossible de supprimer l\'agent.');
        } catch (\Exception $e) {
            notify()->error($e->getMessage(), 'Erreur');
            return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'agent.');
        }
    }
}
