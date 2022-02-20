@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-justify">
            <h3>Disclaimer of liability</h3>
            <p>
                Informations on this website supplements-suplementi.com  are for informational purposes only 
                and given to the best of your knowledge, consideration and insight. They do not constitute 
                medical advices and should not be used for diagnosis or therapy. The publications and the 
                content of the website supplements-suplementi.com and its sub sites cannot be considered as 
                sufficient basis for medical, personal and other decision making.  
            </p>
            <p>
                Informations used for this website were gained from the following sources:
                <ul >
                    <li>Biochemistry, L. Stryer, J. Berg, J. Tymoczko, edition 2013</li>
                    <li>Krause's Food and the Nutrition Care Process, 14., edition 2017</li>
                    <li>Sports nutrition, Z. Šaltić, M. Sorić, M. Mišigoj-Duraković, 2015</li>
                    <li><a href="https://eur-lex.europa.eu/legal-content/HR/TXT/?uri=celex:32012R0432" target="_blank">https://eur-lex.europa.eu/legal-content/HR/TXT/?uri=celex:32012R0432</a> 
                       - Commission Regulation (EU) 432/2012 on the list of permitted health claims</li>
                    <li><a href="https://lpi.oregonstate.edu/" target="_blank">https://lpi.oregonstate.edu/</a></li>
                    <li>
                        <a href="https://www.mayoclinic.org/" target="_blank">https://www.mayoclinic.org/</a>
                    </li>
                    <li>
                        <a href="https://www.webmd.com/" target="_blank">https://www.webmd.com/</a>
                    </li>
                    <li>
                        <a href="https://vitamini.hr/" target="_blank">https://vitamini.hr/</a>
                    </li>
                    <li>Articles from NCBI, Research Gate and SciHub</li>
                </ul>
            </p>
            <p>
                Before using nutritional supplements, seek an advice from your doctor about the use of each 
                product. Nutritional supplements cannot replace a medical procedure or treatment. 
            </p>
            <p>
                In any case of misunderstanding, wrong interpretation or misuse of the information provided, 
                supplements-suplemeti.com is not responsible for any direct or indirect damage, including 
                health consequences. If you have any problems, consult your doctor or pharmacist.
            </p>
            <p>
                We cannot guarantee that the information on the website supplements-suplemeti.com will fully 
                meet your needs. We also cannot guarantee that the service will be without deviation. If there 
                is a discrepancy or error, please report it through the email: <a href="mailto:support@mcanaliza.org">support@mcanaliza.org</a> 
                so that we can correct them as quickly as possible.
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
