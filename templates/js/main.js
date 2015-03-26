(function(){

if ($("#formAdicione").length > 0) {
        
    $("#formAdicione").ajaxForm({
        //dataType: 'json', 
        beforeSubmit: function(formData, jqForm, options) {
            for (var i=0; i < formData.length; i++) { 
                console.log(formData[i].name, formData[i].value)
                /*if (!formData[i].value) { 
                    alert('Please enter a value for both Username and Password'); 
                    return false; 
                } */
            } 
        },
        error: function() {
            console.log("erro:", arguments);
        },
        success: function(data) {
            console.log("sucesso:", data);
        }
    }); 


    function initializeSelectBox() 
    {
        
    }

}


})();