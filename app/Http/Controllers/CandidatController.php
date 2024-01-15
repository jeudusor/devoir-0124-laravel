<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckProgramRequest;
use App\Models\Program;
use App\Models\Secteur;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class CandidatController extends Controller
{
    public function index() : RedirectResponse {
        return redirect()->route('user.candidat.admin');
    }

    public  function admin() : View {

        $secteurs = Secteur::all();
        return view('user.candidat.admin', [
            'secteurs' => $secteurs
        ]);
    }


     public function create(CheckProgramRequest $request) {

        $program = new Program();
        $oldPrograms_total = Auth::user()->programs_total;
        $newPrograms_total  =  $oldPrograms_total + 1;

        $user = User::findorfail(Auth::user()->id);
        $user->programs_total = $newPrograms_total;
        $user->save();

        $program->title = $request->title;
        $program->content = $request->content;
        $program->secteur_id = $request->secteur_id;
        $program->user_id = Auth::user()->id;
        $program->user->programs_total = $newPrograms_total;
        $program->save();



        return redirect()->route('user.candidat.admin')->with(
            'success', 'L\'ajout a bien éte fait'
        );
    }
}
