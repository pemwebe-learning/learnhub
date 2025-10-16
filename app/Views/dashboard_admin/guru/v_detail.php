<div class="container-fluid">
  <div class="row">
    <div class="col-12"> <!-- gunakan col-12 agar tabel memenuhi seluruh lebar -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-bordered table-hover mb-0">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Task</th>
                <th>Progress</th>
                <th style="width: 40px">Label</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td>Upload Materi Pembelajaran</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar bg-primary" style="width: 55%"></div>
                  </div>
                </td>
                <td><span class="badge bg-danger">55%</span></td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Membuat Renccana Pembelajaran (RPP)</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar bg-warning" style="width: 70%"></div>
                  </div>
                </td>
                <td><span class="badge bg-warning">70%</span></td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Input Nilai Ke Sistem</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar bg-primary" style="width: 30%"></div>
                  </div>
                </td>
                <td><span class="badge bg-info">30%</span></td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Mengoreksi Tugas Siswa</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar bg-success" style="width: 90%"></div>
                  </div>
                </td>
                <td><span class="badge bg-success">90%</span></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
