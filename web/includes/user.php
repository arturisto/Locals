<div class="w-75 m-auto pt-3">

    <div id="alertGoesHere"></div>
    <div class="modal" id="previewModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class=" modal-body" id="modal-body">
                </div>
                <img id="image-preview" class="m-auto" style="max-height:300px; max-width:300px;" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-new" type="button" role="tab" aria-controls="nav-new" aria-selected="false">New Feedback</button>
            <?php
            $email = $_SESSION['EMAIL'];
            echo ' <button class="nav-link " onClick="getFeedbacks(\'' . $email . '\')" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-my" type="button" role="tab" aria-controls="nav-my" aria-selected="true">My feedbacks</button>'
            ?>
            <button class="nav-link" onClick="getFeedbacks(null)" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="false">All Feedbacks</button>
        </div>
    </nav>
    <div class="tab-content pt-2" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab">
            <form action="" enctype="multipart/form-data" method="POST" id="feedback-form">
                <fieldset disabled>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="email" class="form-control" id="name" name="name" value=<?php echo $_SESSION["USERNAME"] ?> placeholder=<?php echo $_SESSION["USERNAME"] ?>>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value=<?php echo $_SESSION["EMAIL"] ?> placeholder=<?php echo $_SESSION["EMAIL"] ?>>
                    </div>
                </fieldset>
                <div class="mb-3">
                    <label for="text" class="form-label">Feedback</label>
                    <textarea class="form-control" id="text" rows="3" name="text" placeholder="Please write us your feedback"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">File</label>
                    <input class="form-control" type="file" name="file" id="form-file" accept=".jpeg,.png,.gif" onChange="loadFile(event)">
                </div>
                <button type="submit" name="submit" class="btn btn-primary" onClick="submitFeedback(event)">Submit Feedback</button>
                <button class="btn btn-warning" onClick="onPreviewSubmitForm(event)">Preview </button>
        </div>

        <div class="tab-pane fade" id="nav-my" role="tabpanel" aria-labelledby="nav-my-tab">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Date Submitted</th>
                        <th scope="col">Text</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody id="my-feedbacks-body">

                </tbody>
            </table>


        </div>
        <div class="tab-pane fade " id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Date Submitted</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Text</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody id="all-feedbacks-body">

                </tbody>
            </table>

        </div>



    </div>
    <script type="text/javascript" src="./scripts/feedbackPreview.js"></script>
    <script type="text/javascript" src="./scripts/getFeedbacks.js"></script>
    <script type="text/javascript" src="./scripts/submitFeedback.js"></script>

</div>