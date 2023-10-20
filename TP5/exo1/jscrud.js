$(document).ready(function () {
    $("#addStudentForm").on("submit", function (event) {
        event.preventDefault(); // Empêcher l'envoi du formulaire au serveur

        let nom = $("#inputNom").val();
        let prenom = $("#inputPrenom").val();
        let date = $("#inputDate").val();
        let coursWeb = $("#inputCoursWeb").is(":checked") ? "oui" : "non";
        let remarque = $("#inputRemarque").val();
        let newRow = `
            <tr>
                <td>${nom}</td>
                <td>${prenom}</td>
                <td>${date}</td>
                <td>${coursWeb}</td>
                <td>${remarque}</td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button>
                    <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>
                </td>
            </tr>
        `;
        $("#studentsTableBody").append(newRow); 
    })
})
    
function modifyRow(button) {
    let row = $(button).closest("tr");
    
    let nom = row.find('td:eq(0)').text();
    let prenom = row.find('td:eq(1)').text();
    let anniv = row.find('td:eq(2)').text();
    let avis = row.find('td:eq(3)').text();
    let rq = row.find('td:eq(4)').text();

    row.find('td:eq(0)').html(`<input type="text" value="${nom}" />`);
    row.find('td:eq(1)').html(`<input type="text" value="${prenom}" />`);
    row.find('td:eq(2)').html(`<input type="date" value="${anniv}" />`);
    row.find('td:eq(3)').html(`<input type="checkbox" ${avis === 'oui' ? 'checked' : ''} />`);
    row.find('td:eq(4)').html(`<input type="text" value="${rq}" />`);
    row.find("button:contains('Modify')").replaceWith('<button class="btn btn-success btn-save" onclick="saveRow(this)">Sauvegarder</button>');
}

function saveRow(button) {
    let row = $(button).closest("tr");
    let cells = row.find("td");

    let newValues = [];
    cells.each(function() {
        newValues.push($(this).find("input").val());
    });

    cells.each(function(i) {
        $(this).text(newValues[i]);
    });

    row.find("button:contains('Sauvegarder')").replaceWith('<button class="btn btn-primary btn-modify" onclick="modifyRow(this)">Modify</button>');
}

function deleteRow(button) {
    $(button).closest("tr").remove();
}