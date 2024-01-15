<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckUserRequest;
use App\Http\Requests\SondageRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Program;
use App\Models\Secteur;
use App\Models\Sondage;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use function Laravel\Prompts\password;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    //more stuff must be to do here
    public function index(Request $request) : RedirectResponse | View {
        return to_route('user.dashboard');
    }



    public function login(Request $request) : RedirectResponse | View {

        if (!Auth::check())
            return view('user.login');

        return redirect()->route('user.dashboard', ['request' => $request])->withErrors([
            'yetConnect' => 'Vous Etes deja connecter'
        ]);
    }
    public function checkLogin(CheckUserRequest $request) {

        $credential = $request->validated();

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended(route('user.dashboard'));
        }

        return to_route('user.login')->withErrors([
            'email' => "Aucune correspondance email / mots de passe dans la base"
        ])->onlyInput('email');

    }


    public  function createUser() : View {

        return view('user.signup');
    }
    public function tryStoreUser(StoreUserRequest $request) : RedirectResponse | View {

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        $credential = $request->only('email', 'password');
        Auth::attempt($credential);

        $request->session()->regenerate();

        return to_route('user.dashboard');
    }
    public  function tryStoreSondage (SondageRequest $request) : RedirectResponse | View {

        $user_id = Auth::user()->id;
        $messageSuccess = "sondage ajouter sur le programme numéro $request->programs_id";

        $sondage = new Sondage();
        $sondage->felling_title = $request->felling_title;
        $sondage->felling = $request->felling;
        $sondage->content = $request->content;
        $sondage->user_id = $user_id;
        $sondage->programs_id = $request->programs_id;
        $sondage->save();

        return redirect()->route('user.sondages')->with('success', $messageSuccess);

    }


    public function dashboard() : View | RedirectResponse{
        $secteurs = Secteur::paginate(3);
        return view('user.dashboard', [
            'secteurs' => $secteurs
        ]);

    }


    public function showPrograms(Request $request) : View | RedirectResponse {

        if (isset($request->idSecteur) || isset($request->page) || !empty($request->idSecteur)){

        $programs = Program::all()->where('secteur_id', '=' , $request->idSecteur);

        return view('user.dashboard', ['programs' => $programs]);
        }

        return redirect()->route('user.dashboard', ['request' => $request])->withErrors([
            'unknowSecteur' => 'Auncun secteur n\'a été selectionner'
        ]);

    }
    public function showProgram(Request $request) : View | RedirectResponse {

        $program = Program::findorfail($request->idProgram);

        return view('user.dashboard', ['program' => $program]);
    }
    public function showSondages(Request $request) : View | RedirectResponse {

        $sondages = Sondage::all();
        return view('user.sondages', [
            'request' => $request,
            'sondages' => $sondages
        ]);
    }

    public function profil() : View {
        $profil = \Illuminate\Support\Facades\Auth::user();
        return view('user.profil', [
            'profil' => $profil
        ]);
    }

    public function logout() : RedirectResponse {
        Auth::logout();

        return to_route('root.index');
    }
}
