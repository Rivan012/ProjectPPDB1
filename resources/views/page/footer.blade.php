<div class="container py-4">
    <div class="row">
        <div class="col-md-4">
            <h5>Kontak Kami</h5>
            <ul class="list-unstyled">
                <li><strong>Telepon:</strong> {{ config('app.web_no_telp') }}</li>
                <li><strong>Email:</strong>  {{ config('app.web_email') }}</li>
            </ul>
        </div>
        <div class="col-md-4">
            <h5>Alamat</h5>
            <ul class="list-unstyled">
                <li>Jl. Contoh No. 123</li>
                <li>Jakarta, Indonesia</li>
                <li>12345</li>
            </ul>
        </div>
        <div class="col-md-4">
            <h5>Sosial Media</h5>
            <ul class="list-unstyled">
                <li><a href="#" class="text-dark">Facebook</a></li>
                <li><a href="#" class="text-dark">Twitter</a></li>
                <li><a href="#" class="text-dark">Instagram</a></li>
            </ul>
        </div>
    </div>
    <div class="text-center mt-4">
        &copy; {{ date('Y') .' '. config('app.web_title') }}. All rights reserved.
    </div>
</div>