@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-justify">
            <h3>Izjava o odricanju odgovornosti</h3>
            <p>
                Informacije na ovoj web stranici supplements-suplementi.com su isključivo informativne
                 prirode te dane u najboljoj namjeri, na vaše razmatranje i uviđaj. One ne predstavljaju 
                 liječničke ili medicinske savjete te se ne smiju koristiti za dijagnozu ili terapiju. 
                 Publikacije i sadržaj koji se nalazi na stranicama supplements-suplementi.com  i njenim
                  pod stranicama ne mogu se smatrati dovoljnim temeljem za donošenje medicinskih, osobnih 
                  i drugih odluka.  
            </p>
            <p>
                Podaci korišteni za informacije za ovaj web su dobiveni iz slijedećih izvora:
                <ul >
                    <li>Biokemija, L. Stryer, J. Berg, J. Tymoczko, izdanje 2013.</li>
                    <li>Krause's Food and the Nutrition Care Process, 14. Izdanje 2017</li>
                    <li>Sportska prehrana, Z. Šaltić, M. Sorić, M. Mišigoj-Duraković, 2015.</li>
                    <li>Uredba Komisije (EU) 432/2012 o popisu dopuštenih zdravstvenih tvrdnji (<a href="https://eur-lex.europa.eu/legal-content/HR/TXT/?uri=celex:32012R0432" target="_blank">https://eur-lex.europa.eu/legal-content/HR/TXT/?uri=celex:32012R0432</a>)</li>
                    <li>Linus Pauling Institut - <a href="https://lpi.oregonstate.edu/" target="_blank">https://lpi.oregonstate.edu/</a></li>
                    <li>Mayo clinic -
                        <a href="https://www.mayoclinic.org/" target="_blank">https://www.mayoclinic.org/</a></li>
                    <li>WebMD - <a href="https://www.webmd.com/" target="_blank">https://www.webmd.com/</a></li>
                    <li>Vitamini.hr / Vitaminoteka - <a href="https://vitamini.hr/" target="_blank">https://vitamini.hr/</a></li>
                    <li>Istraživanja s NCBI, Research Gatea i SciHub-a</li>
                </ul>
            </p>
            <p>
                Prije korištenja dodataka prehrani potražite savjet svog liječnika o upotrebi pojedinog proizvoda. 
                Dodaci prehrani ne mogu zamijeniti liječnički postupak ili liječenje. 
            </p>
            <p>
                U slučaju neshvaćanja, pogrešnog razumijevanja ili zlouporabe danih informacija, web stranica 
                supplements-suplementi.com nije odgovorna za bilo kakvu izravnu ili neizravnu štetu, uključujući 
                i zdravstvene posljedice. U slučaju poteškoća, obratite se liječniku ili ljekarniku.
            </p>
            <p>
                Ne možemo garantirati da će podaci na supplements-suplementi.com u potpunosti odgovarati Vašim potrebama. 
                Također ne možemo garantirati da će usluga biti bez odstupanja. Ukoliko dođe do odstupanja ili pogreške, molimo 
                Vas da je prijavite putem emaila: <a href="mailto:support@mcanaliza.org">support@mcanaliza.org</a> kako bismo ih 
                otklonili na najbrži mogući način.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2 text-center">
            <a type="button" class="btn btn-warning btn-lg" href="{{ url('/') }}">
                {{ __('messages.back') }}
            </a>
        </div>
    </div>
@endsection
