<div class="row">
    <div class="col-md-12">
        <h2>Reservation Analytics</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <!-- Filter untuk Jumlah Reservasi per Bulan -->
        <form action="" method="get">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Filter by Date Range:</h5>
                    <div class="form-group">
                        <select name="dateRange" id="dateRange" class="form-select">
                            <option value="past30">Past 30 Days</option>
                            <option value="next30">Next 30 Days</option>
                        </select>
                    </div>
                    <h5 class="card-title">Filter by Reservation Count:</h5>
                    <div class="form-group">
                        <select name="reservationCount" id="reservationCount" class="form-select">
                            <option value="small">Small (0-10 reservations)</option>
                            <option value="medium">Medium (11-50 reservations)</option>
                            <option value="large">Large (51+ reservations)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Apply Filter</button>
                    </div>
                </div>
            </div>

            <!-- Grafik Jumlah Reservasi per Bulan -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Reservasi per Bulan</h5>
                    <canvas id="reservationChart" width="400" height="200"></canvas>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <!-- Tabel Top 5 Kamar Terpopuler -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Top 5 Kamar Terpopuler</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nama Homestay</th>
                                <th class="text-center">Jumlah Reservasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topHomestays as $homestay)
                            <tr>
                                <td>{{ $homestay->nama }}</td>
                                <td class="text-center">{{ $homestay->pemesanan_count }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
