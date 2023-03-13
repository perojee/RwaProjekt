<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategorija;
use Illuminate\Support\Facades\Auth;
use App\Models\Artikli;
use App\Models\Komentari;
use App\Models\kosara;
use App\Models\Narudzba;
use App\Models\User;
use Notification;

use App\Notifications\SaljiEmail;








class AdminController extends Controller
{
    public function view_kategorija()
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $data=Kategorija::all();
        return view('admin.kategorija', compact('data'));
        } else {
            return redirect('login');
        }
    }

    public function dodaj_kategoriju(Request $request)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $data= new Kategorija;
        $data->ime_kategorije=$request->kategorija;
        $data->save();

        return redirect()->back()->with('message', 'Kategorija uspješno unesena');
        } else {
            return redirect('login');
        }
    }

    public function obrisi_kategoriju($id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $data=Kategorija::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Kategorija uspješno obrisana');
    } else {
        return redirect('login');
    }
    }

    public function view_artikl()
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $kategorija=Kategorija::all();
        return view('admin.artikl', compact('kategorija'));
    } else {
        return redirect('login');
    }
    }

    public function dodaj_artikl(Request $request)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $artikl=new artikli;

        $artikl->ime=$request->naziv;
        
        $artikl->opis=$request->opis;
        
        $artikl->cijena=$request->cijena;
        
        $artikl->kolicina=$request->kolicina;
        
        $artikl->kategorija=$request->kategorija;

        $slika=$request->slika;

        $imeslike=time().'.'.$slika->getClientOriginalExtension();

        $request->slika->move('artikal', $imeslike);

        $artikl->slika=$imeslike;

        $artikl->save();

        return redirect()->back()->with('message', 'Artikal dodan uspješno');
    } else {
        return redirect('login');
    }
    }

    public function show_artikl()
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $artikal=artikli::all();
        return view('admin.sartikl', compact('artikal'));
    } else {
        return redirect('login');
    }
    }

    public function obrisi_artikl($id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $artikl=artikli::find($id);
        $artikl->delete();
        return redirect()->back()->with('message', 'Artikal obrisan uspješno');
    } else {
        return redirect('login');
    }
    }

    public function uredi_artikl($id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $artikl=artikli::find($id);
        $kategorija=Kategorija::all();
        return view('admin.uredi_item', compact('artikl','kategorija'));
    } else {
        return redirect('login');
    }
        
    }
    public function izmjeni_artikl(Request $request,$id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $artikl=artikli::find($id);
        $artikl->ime=$request->naziv;

        $artikl->opis=$request->opis;

        $artikl->cijena=$request->cijena;

        $artikl->kolicina=$request->kolicina;

        $artikl->kategorija=$request->kategorija;

        $slika=$request->slika;
        if($slika)
        {
            $imeslika=time().'.'.$slika->getClientOriginalExtension();

            $request->slika->move('artikal', $imeslika);
    
            $artikl->slika=$imeslika;
        }
       

        $artikl->save();

        return redirect()->back()->with('message', 'Artikal uspješno ažuriran');
    } else {
        return redirect('login');
    }
    }

    public function narudzba()
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $order=Narudzba::all();
        return view('admin.narudzbe', compact('order'));
    } else {
        return redirect('login');
    }
    }

    public function odobreno($id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $order=Narudzba::find($id);
        $artikal_id= $order->artikal_id;
        $artikal=Artikli::where('id','=',$artikal_id)->find($artikal_id);
        $order->dostava_status="Odobreno";
        $artikal->kolicina= $artikal->kolicina - $order->kolicina;
        $artikal->save();
        $order->save();

        return redirect()->back();
    } else {
        return redirect('login');
    }
        
    }

    public function odbijeno($id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $order=Narudzba::find($id);
        $order->dostava_status="Poništeno";
        $order->save();
        return redirect()->back();
    } else {
        return redirect('login');
    }
    }

    public function posalji_mail($id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $order=Narudzba::find($id);
        return view('admin.email', compact('order'));
    } else {
        return redirect('login');
    }
    }

    public function posalji_korisniku_email(Request $request,$id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $order=narudzba::find($id);
        $detalji=[
            'saljiemail' =>$request->saljiemail
        ];

        Notification::send($order,new SaljiEmail($detalji));

        return redirect()->back();
    } else {
        return redirect('login');
    }
    }

    public function search_order(Request $request)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $pretraga=$request->search;
        $order=Narudzba::where('ime', 'LIKE', "%$pretraga%")->orWhere('naziv_artikla', 'LIKE', "%$pretraga%")->get();
        return view('admin.narudzbe', compact('order'));
    } else {
        return redirect('login');
    }
    }

    public function korisnici()
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){      
            $korisnici=User::all();
            return view('admin.korisnici', compact('korisnici'));
        } else {
            return redirect('login');
        }
    }
    public function posalji_mail2($id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $korisnik=User::find($id);
        return view('admin.email2', compact('korisnik'));
    } else {
        return redirect('login');
    }
    }
    
    public function posalji_korisniku_email2(Request $request,$id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $order=User::find($id);
        $detalji=[
            'saljiemail' =>$request->saljiemail
        ];

        Notification::send($order,new SaljiEmail($detalji));

        return redirect()->back();
    } else {
        return redirect('login');
    }
    }

    public function obrisi_korisnika($id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $korisnik=User::find($id);
        $korisnik->delete();
        return redirect()->back()->with('message', 'Korisnik obrisan uspješno');
    } else {
        return redirect('login');
    }
    }
    public function komentari()
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){      
            $komentari=Komentari::all();
            return view('admin.komentari', compact('komentari'));
        } else {
            return redirect('login');
        }
    }
    public function obrisi_komentar($id)
    {
        if(Auth::id() && (Auth::User()->usertype == 1)){
        $komentar=Komentari::find($id);
        $komentar->delete();
        return redirect()->back()->with('message', 'komentar obrisan uspješno');
    } else {
        return redirect('login');
    }
    }
}

