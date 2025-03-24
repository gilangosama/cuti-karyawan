<table>
    <tr>
        <td colspan="4" style="text-align: center; font-weight: bold;">
            PT. KALTIM METHANOL INDUSTRI
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center;">
            FORMULIR PENGAJUAN CUTI
        </td>
    </tr>
    <tr>
        <td colspan="4">No. Document: SMT.FM.PSL-01-02</td>
    </tr>
    <tr>
        <td colspan="2">Tanggal: {{ $cuti->created_at->format('d F Y') }}</td>
        <td colspan="2" style="text-align: right;">Rev.: 01 Hal.: 1 dari 1</td>
    </tr>
    
    <!-- Informasi Karyawan -->
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>: {{ $cuti->user->name }}</td>
        <td>Jabatan</td>
        <td>: {{ $cuti->user->profil->position ?? '-' }}</td>
    </tr>
    <tr>
        <td>Badge</td>
        <td>: {{ $cuti->user->badge_number ?? '-' }}</td>
        <td>Department</td>
        <td>: {{ $cuti->user->profil->department ?? '-' }}</td>
    </tr>
    
    <!-- Detail Cuti -->
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4">Dengan ini mengajukan {{ strtolower($cuti->jenis_cuti) }} selama {{ $cuti->total_days }} hari</td>
    </tr>
    <tr>
        <td>Mulai Tanggal</td>
        <td>: {{ $cuti->start_date->format('d F Y') }}</td>
        <td>Sampai Tanggal</td>
        <td>: {{ $cuti->end_date->format('d F Y') }}</td>
    </tr>
    <tr>
        <td>Alamat Cuti</td>
        <td colspan="3">: {{ $cuti->address }}</td>
    </tr>
    
    <!-- Approval -->
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center; font-weight: bold;">PERSETUJUAN</td>
    </tr>
    <tr>
        <td style="text-align: center;">Pemohon</td>
        <td style="text-align: center;">Approval 1</td>
        <td style="text-align: center;">Approval 2</td>
        <td style="text-align: center;">HRD</td>
    </tr>
    <tr>
        <td style="height: 50px;">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align: center;">{{ $cuti->user->name }}</td>
        <td style="text-align: center;">{{ $cuti->approval1->name ?? '-' }}</td>
        <td style="text-align: center;">{{ $cuti->approval2->name ?? '-' }}</td>
        <td style="text-align: center;">{{ $cuti->hrd->name ?? '-' }}</td>
    </tr>
    <tr>
        <td style="text-align: center;">{{ $cuti->created_at->format('d/m/Y') }}</td>
        <td style="text-align: center;">{{ $cuti->approval1_date ? $cuti->approval1_date->format('d/m/Y') : '-' }}</td>
        <td style="text-align: center;">{{ $cuti->approval2_date ? $cuti->approval2_date->format('d/m/Y') : '-' }}</td>
        <td style="text-align: center;">{{ $cuti->hrd_date ? $cuti->hrd_date->format('d/m/Y') : '-' }}</td>
    </tr>
</table> 