<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Data Cuti Karyawan</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tabel Data -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl">
                <div class="p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th>No. Registrasi</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jenis Cuti</th>
                                <th>Periode Cuti</th>
                                <th>Durasi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>REG/2024/001</td>
                                <td>20 Mar 2024</td>
                                <td>Cuti Tahunan</td>
                                <td>22 Mar 2024 - 24 Mar 2024</td>
                                <td>3 Hari</td>
                                <td>
                                    <span class="badge" style="background-color: #FCD34D; color: #92400E;">
                                        Menunggu Persetujuan
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="small text-muted">
                        Showing 1 to 10 of 20 results
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#" style="background-color: #7C3AED; border-color: #7C3AED;">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <style>
    .table > :not(caption) > * > * {
        padding: 1rem 0.75rem;
    }
    .table tbody tr:hover {
        background-color: #F9FAFB;
    }
    .badge {
        padding: 0.5rem 0.75rem;
        font-weight: 500;
        border-radius: 20px;
    }
    .page-link {
        color: #6B7280;
        border-radius: 8px;
        margin: 0 2px;
    }
    .page-link:hover {
        color: #7C3AED;
        background-color: #F3F4F6;
    }
    .page-item.active .page-link:hover {
        color: white;
    }
    .table thead th {
        font-size: 0.875rem;
        font-weight: 500;
        color: #6B7280;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    </style>
</x-app-layout> 