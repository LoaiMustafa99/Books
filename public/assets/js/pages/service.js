var isLastLevel = false,
    subCategoriesSelect = $("#SubCategories"),
    subCategoriesBox = subCategoriesSelect.parents("#subCategoriesBox");


$(document).ready(function(){

    $("#mainCategory").on("change",function (){
        subCategoriesBox.fadeOut();
        if($(this).val() != ''){
            let url = $(this).data("url"),
                categoryId = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: url,
                data: {main_id:categoryId},
                success: function( response ) {
                    if(response.status_number === 'S200'){
                        let htmlElements = '<option value="">none</option>';
                        for(category of response.data){
                            htmlElements += `<option value="${category.id}">${category.name}</option>`;
                        }
                        isLastLevel = false;
                        subCategoriesSelect.empty().append(htmlElements);
                        subCategoriesBox.fadeIn();
                    }
                }
            });
        }
    });

});
