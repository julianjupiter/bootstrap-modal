$(document).ready(function(){
    // Thesis Modal
    $("#thesis-modal").modal({
        keyboard: true,
        backdrop: "static",
        show: false,
    }).on("show.bs.modal", (event) => {
        let button = $(event.relatedTarget); // button clicked
        let thesisId = button.data('thesis-id'); // ID of thesis taken from data-thesis-id
        let thesisAction = button.data('thesis-action'); // action to do from data-action

        switch(thesisAction) {
            case 'add':
                addThesis(this); // this = is the #thesis-modal
                break;
                
            case 'edit':
                editThesis(this, thesisId); // this = is the #thesis-modal
                break;
                
            case 'delete':
                deleteThesis(this, thesisId); // this = is the #thesis-modal
                break;
        }        
    }).on('hidden.bs.modal', (event) => {
        // Upon close of modal, clear every thing added/insert to modal when it was opened.
        $(this).find('.modal-title').html('');
        $(this).find('.modal-body').html('');
        $(this).find('.modal-footer').html('');
    });
});

let modalTitle = $('.modal-title');
let modalBody = $('.modal-body');
let thesisFormHidden = $('#thesis-form:hidden'); // Fetch and clone the Thesis Form <see index.html> 
let thesisForm = '#thesis-form';
let modalFooter = $('.modal-footer');
let closeThesisModal = $('<button id="close-thesis-modal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>');
let addThesisModal = $('<button id="add-thesis-modal" type="submit" class="btn btn-primary">Add</button>');
let updateThesisModal = $('<button id="update-thesis-modal" type="submit" class="btn btn-primary">Update</button>');
let deleteThesisModal = $('<button id="delete-thesis-modal" type="submit" class="btn btn-danger">Delete</button>');

function addThesis(modal) {
    $(modal).find(modalTitle).html('Add Thesis');
    $(modal).find(modalBody).html(thesisFormHidden.clone()); // Insert Thesis Form
    $(modal).find(thesisForm).css('display', 'block'); // Show Thesis Form from hidden after inserted <see previous line>
    $(modal).find(modalFooter).append(closeThesisModal); // Insert Close button
    $(modal).find(modalFooter).append(addThesisModal); // Insert Add button
}

function editThesis(modal, thesisId) {
    let thesisIdInput = $(`<div class="form-group">
						       <label for="id">ID</label>
							    <input type="text" id="id" class="form-control" value="${thesisId}" disabled="disabled">
						   </div>`);

    $(modal).find(modalTitle).html('Edit Thesis');
    // call ajax here to get the data of thesisId and insert them to the value of form input    
    $(modal).find(modalBody).html(thesisFormHidden.clone()); // Insert Thesis Form
    $(modal).find(thesisForm).css('display', 'block'); // Show Thesis Form from hidden after inserted <see previous line>
    $(modal).find(thesisForm).prepend(thesisIdInput);
    $(modal).find(modalFooter).append(closeThesisModal); // Insert Close button
    $(modal).find(modalFooter).append(updateThesisModal); // Insert Update button
}

function deleteThesis(modal, thesisId) {
    let content = 'Are you sure you want to delete Thesis with ID ' + thesisId + '?';
    $(modal).find(modalTitle).html('Delete Thesis');
    $(modal).find(modalBody).html(content);
    $(modal).find(modalFooter).append(closeThesisModal); // Insert Close button
    $(modal).find(modalFooter).append(deleteThesisModal); // Insert Delete button
}