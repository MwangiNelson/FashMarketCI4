<div class="dataHandling" style="display: flex; flex-wrap:nowrap; width:100%; margin-top:10px; margin-bottom:10px;">
    <div class="addItem">
        <h3>Add Item</h3>
        <div class="addition">
            <form enctype="multipart/form-data" action="<?= base_url('authenticate/add_items'); ?>" method="post" style="width: 100%; padding:10px 5px;">
                <?= csrf_field(); ?>


                <?php
                if (!empty(session()->getFlashdata('fail'))) :
                ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php
                if (!empty(session()->getFlashdata('success'))) :
                ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <div class="holger">
                    <label for="item_name">Item name :</label>
                    <input type="text" class="form-control" name="item_name" id="product_name">
                </div>
                <div class="holger">
                    <label for="item_quantity">Quantity in Stock :</label>
                    <input type="number" min="0" class="form-control" name="item_quantity" id="product_quantity">
                </div>
                <div class="holger">
                    <label for="item_price">Item price :</label>
                    <input type="number" min="0" class="form-control" name="item_price" id="product_price">
                </div>
                <div class="holger">
                    <label for="category">Category</label>
                    <select id="product_category" name="category" class="ctg-list">
                    </select>
                </div>
                <div class="holger">
                    <label for="rating">Rating</label>
                    <select id="product_rating" name="rating">
                        <option value="1">Featured</option>
                        <option value="0">Not Featured</option>

                    </select>
                </div>

                <div class="Photo_Preview">


                    <div class="imgPreview" id="ImgPreview">
                        <img src="" alt="Image Preview" class="image_preview">
                        <span class="Preview_text"> Image Preview</span>

                    </div>
                    <div class="texty">
                        <input type="file" class="file-upload-input" id="inpFile" name="inpFile" accept="Image/*" required>
                    </div>
                    <script>
                        const inpFile = document.getElementById("inpFile");
                        const PreviewContainer = document.getElementById("ImgPreview");
                        const PreviewImage = PreviewContainer.querySelector(".image_preview");
                        const PreviewDefaultText = PreviewContainer.querySelector(".Preview_text");

                        inpFile.addEventListener("change", function() {
                            const file = this.files[0];

                            if (file) {
                                const reader = new FileReader();

                                PreviewDefaultText.style.display = "none";
                                PreviewImage.style.display = "flex";

                                reader.addEventListener("load", function() {
                                    PreviewImage.setAttribute("src", this.result);
                                });

                                reader.readAsDataURL(file);
                            }


                        })
                    </script>
                </div>

                <div class="editBn" style="display: flex; flex-wrap:nowrap; padding:3px;">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>

            </form>
        </div>

    </div>
    <div class="addItem" id="addItem">
        <h3>Edit Item</h3>
        <div class="addition">
            <form action="" style="width: 100%; padding:10px 5px;">
                <div class="holger">
                    <label for="itemName">Edit name :</label>
                    <input type="text" class="form-control" name="itemName" id="">
                </div>
                <div class="holger">
                    <label for="quantity">Edit quantity:</label>
                    <input type="number" min="0" class="form-control" name="quantity" id="">
                </div>
                <div class="holger">
                    <label for="itemPrice">Edit price :</label>
                    <input type="number" min="0" class="form-control" name="itemPrice" id="">
                </div>
                <div class="holger">
                    <label for="category">Category</label>
                    <select id="product_category" name="category" class="ctg-list">
                    </select>
                </div>
                <div class="holger">
                    <label for="rating">Rating</label>
                    <select id="rating" name="rating">
                        <option value="1">Featured</option>
                        <option value="0">Not Featured</option>
                    </select>
                </div>

                <div class="Photo_Preview">


                    <div class="imgPreview" id="ImgPreview">
                        <img src="" alt="Image Preview" class="image_preview">
                        <span class="Preview_text"> Image Preview</span>

                    </div>
                    <div class="text">
                        <input type="file" class="file-upload-input" id="EditFile" accept="Image/*" id="">
                    </div>
                    <script>
                        const EditFile = document.getElementById("EditFile");
                        const EditPreviewContainer = document.getElementById("ImgPreview");
                        const EditPreviewImage = PreviewContainer.querySelector(".image_preview");
                        const EditPreviewDefaultText = PreviewContainer.querySelector(".Preview_text");

                        inpFile.addEventListener("change", function() {
                            const file = this.files[0];

                            if (file) {
                                const reader = new FileReader();

                                PreviewDefaultText.style.display = "none";
                                PreviewImage.style.display = "flex";

                                reader.addEventListener("load", function() {
                                    PreviewImage.setAttribute("src", this.result);
                                });

                                reader.readAsDataURL(file);
                            }


                        })
                    </script>
                </div>

                <div class="editBn" style="display: flex; flex-wrap:nowrap; padding:3px; width:100%;">
                    <button type="button" class="btn btn-warning">Edit</button>
                </div>

            </form>
        </div>

    </div>
</div>