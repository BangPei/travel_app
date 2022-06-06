<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Table User</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <table id="tbl-user" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <?= $is_active = $user['is_active'] ?>
                    <tr>
                        <td><?= $user['fullname'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['role_id'] ?></td>
                        <td>
                            <div class="badge badge-<?= $is_active == 1 ? 'success' : 'danger' ?>"><?= $is_active == 1 ? 'Active' : 'Disactive' ?></div>
                        </td>
                        <td><a class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->

<script>
    $(document).ready(function() {
        $('#tbl-user').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    })
</script>