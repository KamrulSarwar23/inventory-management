<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category Name*</label>
                                <input type="text" class="form-control" id="categoryNameUpdate">
                                <input class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-info mx-2 text-light text-bold" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>

                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>

        </div>
    </div>
</div>


<script>
    async function FillUpUpdateForm(id) {

        document.getElementById('updateID').value = id;

        showLoader();
        let response = await axios.post("/category-by-id", {
            id: id
        });
        hideLoader();

        document.getElementById('categoryNameUpdate').value = response.data.name;
    }

    async function Update() {
        let categoryNameUpdate = document.getElementById('categoryNameUpdate').value;
        let categoryIdUpdate = document.getElementById('updateID').value;

        if (categoryNameUpdate.length === 0) {
            errorToast('Category Name Is Required');
        } else {
            document.getElementById('update-modal-close').click();
            let response = await axios.post("/update-category", {
                name: categoryNameUpdate,
                id: categoryIdUpdate
            });

            if (response.status===200 && response.data['status'] === 'success') {
                successToast(response.data['message'])
                await getList();
            } else {
                errorToast('Something Went Wrong')
            }
        }
    }
</script>
