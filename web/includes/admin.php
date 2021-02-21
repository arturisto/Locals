<div class="w-75 m-auto pt-3" id="admin-panel">

    <div id="alertGoesHere"></div>
    <div class="modal" id="update-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Text Update Box</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class=" modal-body" id="modal-body">
                        <textarea class="form-control" id="text-modal" rows="3" name="text"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning" onClick="updateText(event)">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="previewModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">image preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class=" modal-body">
                </div>
                <img id="image-preview" class="m-auto" style="max-height:300px; max-width:300px;" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex mb-5">
        <button type="button" onClick="adminAction('approve');" class="btn btn-success mx-5">Approve</button>
        <button type="button" onClick="adminAction('delete');" class="btn btn-danger">Delete</button>
        <button type="button" onClick="adminAction('update');" class="btn btn-warning mx-5">Update</button>
    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" onClick="getAdminFeedbacks('pending')" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#pending-tab" type="button" role="tab" aria-controls="nav-new" aria-selected="false">Pending</button>
            <button class="nav-link" onClick="getAdminFeedbacks('approved')" id="nav-approved-tab" data-bs-toggle="tab" data-bs-target="#approved-tab" type="button" role="tab" aria-controls="nav-all" aria-selected="false">Approved Feedbacks</button>
            <button class="nav-link" onClick="getAdminFeedbacks('deleted')" id="nav-deleted-tab" data-bs-toggle="tab" data-bs-target="#deleted-tab" type="button" role="tab" aria-controls="nav-all" aria-selected="false">Deleted Feedbacks</button>
        </div>
    </nav>
    <div class="tab-content pt-2" id="nav-tabContent">
        <div class="tab-pane fade show active" id="pending-tab" role="tabpanel" aria-labelledby="nav-new-tab">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Date Submitted</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Text</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody id="pending-table-body">

                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="approved-tab" role="tabpanel" aria-labelledby="nav-my-tab">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Date Submitted</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Text</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody id="approved-table-body">

                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="deleted-tab" role="tabpanel" aria-labelledby="nav-my-tab">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Date Submitted</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Text</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody id="deleted-table-body">

                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="./scripts/getFeedbacks.js"></script>
    <!--Required for the initial preview of the admin panel-->
    <script>
        initialAdminLoad();
    </script>

    <script type="text/javascript" src="./scripts/admin.js"></script>

</div>