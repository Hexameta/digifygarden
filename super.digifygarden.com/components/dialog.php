<?php function editDialog(){ ?>
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <form class="form-horizontal" action="#">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" value="Data">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Email Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" value="Data">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Contact</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" value="Data">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" value="Data">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputEmail3" value="Data">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="file">
                                <input type="file" id="file" aria-label="File browser example">
                                <span class="file-custom"></span>
                            </label>
                        </div>
                    </div><!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php  }?>