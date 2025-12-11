<div class="col-12">
            <div class="card">
              <div class="card-header p-2">
                <h2>PENGUMUMAN</h2>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Pegnumuman -->
                  <?php if (!empty($pengumuman)): ?>
                    <?php foreach ($pengumuman as $i => $a): ?>
                    <div class="post">
                      <div class="user-block">
                        <span class="username">
                          <h3><?= $a['judul_pengumuman'] ?></h3>
                        </span>
                      </div>
                      <p>
                        <?= $a['isi'] ?>
                      </p>
                    </div>     
                    <?php endforeach; ?>
                  <?php else: ?>
                  <tr><td colspan="7" class="text-center text-muted">Belum ada pengumuman.</td></tr>
                  <?php endif; ?>
                    
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>