$(document).ready(function(){
    let selections = $("#selections"),
        selectionOptions = $("#selection-options"),
        form = selectionOptions.children("form"),
        loading = $("#property-loading"),
        formCustomInputsBox = form.find(".form-custom-inputs-box");



    $(".selection-action").on("click",function(){

        let type = $(this).data("type");
       if(type == "SD") {
           let SDFields = $(`
                   <h3>Options</h3>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="form-group">
                                <label>Minimum</label>
                                <input type="text" name="min" class="form-control form-input">
                                <div class="invalid-feedback" style="display: none"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="form-group">
                                <label>Maximum</label>
                                <input type="text" name="max" class="form-control form-input">
                                <div class="invalid-feedback" style="display: none"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="form-group">
                                <label>Minimum Engligh Title</label>
                                <input type="text" name="min_en_title" class="form-control form-input">
                                <div class="invalid-feedback" style="display: none"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="form-group">
                                <label>Minimum Arabic Title</label>
                                <input type="text" name="min_ar_title" class="form-control form-input">
                                <div class="invalid-feedback" style="display: none"></div>

                            </div>
                        </div>
                       <div class="col-lg-6 col-md-8">
                            <div class="form-group">
                                <label>Maximum English Title</label>
                                <input type="text" name="max_en_title" class="form-control form-input">
                                <div class="invalid-feedback" style="display: none"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="form-group">
                                <label>Maximum Arabic Title</label>
                                <input type="text" name="max_ar_title" class="form-control form-input">
                                <div class="invalid-feedback" style="display: none"></div>
                            </div>
                        </div>
                    </div>

               `);


           formCustomInputsBox.empty().append(SDFields);
           form.children("input[name='type']").val("SD")

           selections.fadeOut(500, function () {
               selectionOptions.fadeIn();
           });

        } else if(type === "SL" || type === "DP" || type === "MSL") {

           let SLFields = $(`
                    <h3>Options</h3>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="form-group">
                                <label>Option Engligh Title</label>
                                <input type="text" name="option_en_title[]" class="form-control form-input">
                                <div class="invalid-feedback" style="display: none"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="form-group">
                                <label>Option Arabic Title</label>
                                <input type="text" name="option_ar_title[]" class="form-control form-input">
                                <div class="invalid-feedback" style="display: none"></div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <span class="btn btn-primary add-option">Add Option</span>
                    </div>
               `);

           formCustomInputsBox.empty().append(SLFields);

           selections.fadeOut(500, function () {
               selectionOptions.fadeIn();
           });
        } else if(type === "SW") {
           selections.fadeOut(500, function () {
                selectionOptions.fadeIn();
            });
        } else if(type === "TF" || type === "TA"){
           var fieldType = '';
           if(type === 'TF'){
               fieldType = `
                    <div class="col-lg-6 col-md-8">
                            <div class="form-group">
                                <label>Field Type</label>
                                <select class="form-control selectric form-input" name="field_type">
                                    <option value="1">Text</option>
                                    <option value="2">Number</option>
                                </select>
                            </div>
                        </div>`;
           }
           let TFields = `
                      <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="form-group">
                                <label>Placeholder English Text</label>
                                <input type="text" name="placeholder_en_text" class="form-control form-input">
                                <div class="invalid-feedback" style="display: none"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="form-group">
                                <label>Placeholder Arabic Text</label>
                                <input type="text" name="placeholder_ar_text" class="form-control form-input">
                                <div class="invalid-feedback" style="display: none"></div>
                            </div>
                        </div>
                        ${fieldType}
                    </div>`;
           formCustomInputsBox.empty().append(TFields);
           selections.fadeOut(500, function () {
               selectionOptions.fadeIn();
           });

       }

        form.children("input[name='type']").val(type);

    });

    $(document).on("click",".add-option",function (){
       let fields = `
       <div class="row option">
            <div class="col-lg-12 text-right">
                <button class="btn btn-danger remove"><i class="fas fa-times"></i></button>
            </div>
            <div class="col-lg-6 col-md-8">
                <div class="form-group">
                    <label>Option Engligh Title</label>
                    <input type="text" name="option_en_title[]" class="form-control form-input">
                    <div class="invalid-feedback" style="display: none"></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <div class="form-group">
                    <label>Option Arabic Title</label>
                    <input type="text" name="option_ar_title[]" class="form-control form-input">
                    <div class="invalid-feedback" style="display: none"></div>
                </div>
            </div>
        </div>`;
       $(this).parent().prev().after(fields);
    });


    $("#submitForm").on("click",function (){
        let inputs = form.find(".form-input").removeClass("is-invalid").next(".invalid-feedback").fadeOut();
        let formData = new FormData(form[0]);
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            processData: false,
            contentType: false,
            data: formData,
            beforeSend : function(){
                selectionOptions.fadeOut(100,function (){
                   loading.append(`<div class="loader">Loading...</div>`);
                   loading.fadeIn();
                });
            },
            success: function( response ) {

                //   throw new Error("my error message");
                if(response.status_number == 'S406'){
                    for (type in response.errors){
                        let input = type == "property_icon" ? $("#PropertyIconBox") : $(`input[name=${type}]`);
                        if(Array.isArray(response.errors[type]) || typeof response.errors[type] === 'object'){
                            let inputs = $(`input[name="${type}[]"]`);
                            for (index in response.errors[type]){
                                let input = $(inputs[index]);
                                input.addClass("is-invalid");
                                input.next().fadeIn().text(response.errors[type][index]);
                            }
                        }

                        // let message = $(`<div class="invalid-feedback"></div>`);
                        input.addClass("is-invalid");
                        input.next().fadeIn().text(response.errors[type]);
                    }
                    console.log(loading);
                    loading.fadeOut(100,function (){
                        loading.empty();
                        selectionOptions.fadeIn();
                    });

                }else if (response.status_number == 'S200'){
                    swal("Successfully", response.message, "success");
                    loading.fadeOut(400,function (){
                        loading.empty();
                        formCustomInputsBox.empty();
                        selections.fadeIn(400,function (){
                            form.find(".form-input").val("");
                            $(".uploaded-images").empty();
                        });
                    });
                }
            }
        });
    });

    $("#revertProperty").on("click",function(){
        selectionOptions.fadeOut(400,function (){
            formCustomInputsBox.empty();
            selections.fadeIn(400,function (){
                form.find(".form-input").val("").removeClass("is-invalid").next(".invalid-feedback").css("display","none");
            });
        });
    });

    $(document).on("click",".option .remove", function (){
        $(this).parents(".option").remove();
    });

});



