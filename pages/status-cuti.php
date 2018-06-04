<!-- Example Card-->
<div class="card mb-3">
  <div class="card-header">
    <h5><i class="fa fa-calendar-check-o"></i> Sisa cuti tahun 2017</h5>
  </div>
  <div class="card-body">
    <h5>Jatah cuti tahunan: 6</h5>
    <h5>Sisa cuti tahunan: 3</h5>
  </div>
</div>

<!-- Example DataTables Card-->
<div class="card mb-3">
  <div class="card-header">
    <h5><i class="fa fa-calendar-check-o"></i> Status cuti yang diambil tahun 2017</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Jenis Cuti</th>
            <th>Keterangan</th>
            <th>Status</th>
          </tr>
        </thead>
        <!-- <tfoot>
          <tr>
            <th>Tanggal</th>
            <th>Cuti Bersama</th>
          </tr>
        </tfoot> -->
        <tbody>
          <tr>
            <td>2017/01/02</td>
            <td>Cuti Liburan</td>
            <td>Liburan ke Bali</td>
            <!-- <td class="text-danger"><b>Rejected</b></td> -->
            <td class="text-danger"><b>Ditolak</b></td>
          </tr>
          <tr>
            <td>2017/06/22</td>
            <td>Cuti Sakit</td>
            <td>Sedang demam tinggi</td>
            <td class="text-secondary"><b>Pending</b></td>
          </tr>
          <tr>
            <td>2017/06/20</td>
            <td>Cuti Sakit</td>
            <td>Batuk-batuk</td>
            <!-- <td class="text-success"><b>Accepted</b></td> -->
            <td class="text-success"><b>Diterima</b></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
</div>
