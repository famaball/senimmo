<?php


namespace App\Http\Controllers\Agence;
use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\EtatBien;
use App\Models\Localite;
use App\Models\StatutBien;
use App\Models\Typebien;
use App\Models\User;
use Illuminate\Http\Request;

class Test extends Controller
{
    public function create()
    {

        $user = User::all();
        $agence = Agence::all();
        $typebien = Typebien::all();
        $statut_bien = StatutBien::all();
        $etat_bien = EtatBien::all();
        $localite = Localite::all();

        $this->authorize('admin.bien.create');

        return view('admin.bien.create',compact('user','agence','statut_bien','etat_bien','localite','typebien'));
    }
}
