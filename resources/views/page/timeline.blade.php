@if (count($tmln) > 0)
<div class="card bg-success-sublte mt-2 p-2">
    <h5 class="text-center">Timline Pendaftaran PPDB {{ config('app.web_title') }}</h5>

    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Kegiatan</th>
            <th>Waktu</th>
            <th>Ket</th>
        </tr>
        <?php
        $no = 1;
        ?>
        @foreach ($tmln as $tl)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $tl->nama_tl }}</td>
            <td>{{ $tl->waktu_tl }}</td>
            <td>{{ $tl->ket }}</td>
        </tr>
        @endforeach
    </table>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#e3f2fd" fill-opacity="1" d="M0,256L20,256C40,256,80,256,120,213.3C160,171,200,85,240,48C280,11,320,21,360,74.7C400,128,440,224,480,224C520,224,560,128,600,101.3C640,75,680,117,720,133.3C760,149,800,139,840,149.3C880,160,920,192,960,202.7C1000,213,1040,203,1080,170.7C1120,139,1160,85,1200,53.3C1240,21,1280,11,1320,58.7C1360,107,1400,213,1420,266.7L1440,320L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z"></path>
    </svg>

</div>
@endif