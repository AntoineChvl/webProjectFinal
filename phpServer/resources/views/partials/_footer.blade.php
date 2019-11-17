<footer>
    <div id="boxFooter">
        <!-- Links for the CESI's social network -->
        <div class="elementFooter">
            <p>Retrouvez l'actualité de CESI sur :</p>
            <ul>
                <li><a href="https://www.facebook.com/CESIingenieurs/" class="facebook"><i
                            class="fab fa-facebook-square"></i> Facebook</a></li>
                <li><a href="https://twitter.com/cesiingenieurs%20" class="twitter" target="_blank"><i
                            class="fab fa-twitter"></i> Twitter</a></li>
                <li><a href="https://www.linkedin.com/school/cesiecoledingenieurs/" class="linkedin" target="_blank"><i
                            class="fab fa-linkedin"></i> Linkedin</a></li>
            </ul>
        </div>
        <!-- Link to the CESI's partners and display their logo -->
        <div class="elementFooter">
            <p>Partenaires </p>
                <a href="https://cge.asso.fr/"><img src="{{asset('assets/imgs/CGE.Blanc.jpg')}}" class="logoFooter" alt="CGE"></a>
                <a href="https://www.cti-commission.fr/"><img src="{{asset('assets/imgs/cti.jpg')}}" class="logoFooter" alt="Cti"></a>
                <a href="https://www.hesam.eu/"><img src="{{asset('assets/imgs/HESAM.jpg')}}" class="logoFooter" alt="Hesam"></a>
                <a href="http://www.cdio.org/"><img src="{{asset('assets/imgs/cdio.jpg')}}" class="logoFooter" alt="CDIO"></a>
                <a href="https://certification.afnor.org/marque/afaq"><img src="{{asset('assets/imgs/Afaq.jpg')}}" class="logoFooter" alt="Afao"></a>
            <p>Copyright © CESI.FR</p>
        </div>
        <!-- Link to various informations about the CESI -->
        <div class="elementFooter">
                <a href="{{ route('legal_mention') }}">Mentions légales</a><br>
                <a href="{{ route('cgv') }}">Conditions générales de ventes</a><br>
                <a href="{{ route('contact') }}">Contact</a><br>
                <a href="{{ route('propos') }}">A propos</a>
        </div>
    </div>
</footer>
