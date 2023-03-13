<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Artikli;
use App\Models\Kosara;
use App\Models\narudzba;
use App\Models\Komentari;
use App\Models\Kategorija;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{
    public function index()
    {
        $artikal=artikli::paginate(6);
        return view('home.korisnikpage', compact('artikal'));
    }


    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        if($usertype == '1')
        {
            $artikili=Artikli::all()->count();
            $procesiranje_narudzba=Narudzba::where('dostava_status', '=', 'procesiranje')->count();
            $odobreno_narudzba=Narudzba::where('dostava_status', '=', 'Odobreno')->count();
            $ponisteno_narudzba=Narudzba::where('dostava_status', '=', 'Poništeno')->count();
            $korisnici=User::all()->count();
            $prihodi=Narudzba::where('dostava_status', '=', 'Odobreno')->get();
            $ukupni_prihodi=0;
            foreach($prihodi as $prihodi)
            {
                $ukupni_prihodi=$ukupni_prihodi + $prihodi->cijena;
            }
            return view('admin.home', compact('artikili', 'procesiranje_narudzba', 'korisnici' , 'odobreno_narudzba' ,'ponisteno_narudzba','ukupni_prihodi'));
        } else 
        {
            $artikal=artikli::paginate(6);
            return view('home.korisnikpage', compact('artikal'));
        }
    }

    public function detalji_artikla($id)
    {
        $artikal=Artikli::find($id);
        $komentar=Komentari::where('artikal_id', '=', $artikal->id)->get();
        return view('home.produkt_detalji', compact('artikal', 'komentar'));
    }

    public function dodaj_kosara(Request $request,$id)
    {
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $artikal=Artikli::find($id);
            $artikal_postoji_id=Kosara::where('artikal_id', '=', $id)->where('user_id', '=', $userid)->get('id')->first();
            $kolicina_artikal=Artikli::where('id', '=', $id)->first()->kolicina;
            $zeljena_kolicina=$request->kolicina;
            if($zeljena_kolicina > $kolicina_artikal){
                Alert::warning('Neuspješno!', 'Količinu koju ste odabrali nije dostupna');
                return redirect()->back();
            }
            
            if($artikal_postoji_id != NULL)
            {
                $kolicina_kosara=Kosara::where('artikal_id', '=', $id)->first()->kolicina;
            
            
            if(($kolicina_kosara + $zeljena_kolicina > $kolicina_artikal)){
                Alert::warning('Neuspješno!', 'Količinu koju ste odabrali nije dostupna');
                return redirect()->back();
                }else{


                
                $kosara=Kosara::find($artikal_postoji_id)->first();
                $kolicina=$kosara->kolicina;
                $kosara->kolicina=$kolicina + $request->kolicina;
                $kosara->cijena=$artikal->cijena * $kosara->kolicina;
                $kosara->save();
                Alert::success('Artikal uspješno dodan!');
                return redirect()->back();
                }
            } else 
            {
                $kosara=new kosara;
            $kosara->name=$user->name;
            $kosara->email=$user->email;
            $kosara->phone=$user->phone;
            $kosara->address=$user->address;
            $kosara->user_id=$user->id;
            $kosara->naziv_artikla=$artikal->ime;
            $kosara->cijena=$artikal->cijena * $request->kolicina;
            $kosara->slika=$artikal->slika;
            $kosara->artikal_id=$artikal->id;
            $kosara->kolicina=$request->kolicina;
            $kosara->save();
            Alert::success('Artikal uspješno dodan!');
            return redirect()->back();
            }
        
        } else {
            return redirect('login');
        }
    }

    public function pokazi_kosaru()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
        $cart=Kosara::where('user_id', '=', $id)->get();
        return view('home.showkosara', compact('cart'));
        } else 
        {
            return redirect('login');
        }
        
    }

    public function obrisi_kosara($id)
    {
        $cart=Kosara::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function naruci()
    {
        $user=Auth::user();
        $userid=$user->id;
        $data=Kosara::where('user_id','=',$userid)->get();
        foreach($data as $data)
        {
            $order=new narudzba;
            $order->ime=$data->name;
            $order->email=$data->email;
            $order->broj=$data->phone;
            $order->adresa=$data->address;
            $order->user_id=$data->user_id;
            $order->naziv_artikla=$data->naziv_artikla;
            $order->cijena=$data->cijena;
            $order->kolicina=$data->kolicina;
            $order->slika=$data->slika;
            $order->artikal_id=$data->artikal_id;
            $order->dostava_status="Procesiranje";
            $order->save();
            $cart_id=$data->id;
            $cart=Kosara::find($cart_id);
            $cart->delete();
        }
        return redirect('/')->with('message', 'Uspješno poslana narudžba! Uskoro će te dobiti e-mail potvrdu');
    }

    public function komentiraj(Request $request, $id)
    {
        if(Auth::id())
        {
            $komentar=new Komentari;
            $komentar->ime=Auth::user()->name;
            $komentar->user_id=Auth::user()->id;
            $komentar->artikal_id=$id;
            $komentar->komentar=$request->komentar;
            $komentar->save();
            return redirect()->back();
        } else
        {
            return redirect('login');
        }
    }

    public function svi_produkti()
    {
        $kategorija=Kategorija::all();
        $artikal=Artikli::paginate(6);
        $pretraga='';
        return view('home.allprodukti',['pretraga' => $pretraga] ,compact('artikal', 'kategorija'));
    }

    public function pretraga(Request $request)
    {
        $kategorija=Kategorija::all();
        $fetch_kategorija=$request->kategorija;
        $pretraga=$request->pretraga;
        $min_cijena=$request->min_cijena;
        $max_cijena=$request->max_cijena;
        if($fetch_kategorija != NULL && $min_cijena != NULL && $max_cijena != NULL)
        {
        $artikal=Artikli::where([['ime', 'LIKE', "%$pretraga%"],['kategorija', '=', $fetch_kategorija],['cijena', '<=', $max_cijena], ['cijena', '>=', $min_cijena]])
        ->orWhere([['kategorija', 'LIKE', "%$pretraga%"],['kategorija', '=', $fetch_kategorija],['cijena', '<=', $max_cijena], ['cijena', '>=', $min_cijena]])
        ->paginate(6);

        } elseif($fetch_kategorija != NULL && $min_cijena != NULL)
        {
        $artikal=Artikli::where([['ime', 'LIKE', "%$pretraga%"],['kategorija', '=', $fetch_kategorija],['cijena', '>=', $min_cijena]])
        ->orWhere([['kategorija', 'LIKE', "%$pretraga%"],['kategorija', '=', $fetch_kategorija],['cijena', '>=', $min_cijena]])
        ->paginate(6);

        } elseif($fetch_kategorija != NULL && $max_cijena != NULL)
        {
            $artikal=Artikli::where([['ime', 'LIKE', "%$pretraga%"],['kategorija', '=', $fetch_kategorija],['cijena', '<=', $max_cijena]])
            ->orWhere([['kategorija', 'LIKE', "%$pretraga%"],['kategorija', '=', $fetch_kategorija],['cijena', '<=', $max_cijena]])
            ->paginate(6);

        } elseif($fetch_kategorija != NULL)
        {
            $artikal=Artikli::where([['ime', 'LIKE', "%$pretraga%"],['kategorija', '=', $fetch_kategorija]])
            ->orWhere([['kategorija', 'LIKE', "%$pretraga%"],['kategorija', '=', $fetch_kategorija]])
            ->paginate(6);

        } elseif($min_cijena != NULL && $max_cijena != NULL) 
        {
            $artikal=Artikli::where([['ime', 'LIKE', "%$pretraga%"],['cijena', '<=', $max_cijena], ['cijena', '>=', $min_cijena]])
            ->orWhere([['kategorija', 'LIKE', "%$pretraga%"],['cijena', '<=', $max_cijena], ['cijena', '>=', $min_cijena]])
            ->paginate(6);

        } elseif($min_cijena != NULL)
        {
            $artikal=Artikli::where([['ime', 'LIKE', "%$pretraga%"], ['cijena', '>=', $min_cijena]])
            ->orWhere(([['kategorija', 'LIKE', "%$pretraga%"], ['cijena', '>=', $min_cijena]]))
            ->paginate(6);

        } elseif($max_cijena != NULL)
        {
            $artikal=Artikli::where([['ime', 'LIKE', "%$pretraga%"],['cijena', '<=', $max_cijena]])->
            orWhere(([['kategorija', 'LIKE', "%$pretraga%"],['cijena', '<=', $max_cijena]]))
            ->paginate(6);
        } else {
            $artikal=Artikli::where('ime', 'LIKE', "%$pretraga%")->orWhere('kategorija', 'LIKE', "%$pretraga%")->paginate(6);
        }

        return view('home.allprodukti', ['pretraga' => $pretraga], compact('artikal', 'kategorija'));
    }
}
