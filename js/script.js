$(document).ready(function() {

    loadData();

    $("#feedbackForm").submit(function(e) {
        e.preventDefault();

        let formData = {
            name: $("input[name='name']").val(),
            email: $("input[name='email']").val(),
            message: $("textarea[name='message']").val()
        };

        if (!formData.name || !formData.email || !formData.message) {
            showErrorModal("Заполните все поля!");
            return;
        }
        
        $.ajax({
                    success: function(response) {
            console.log(response); // 👈 ВСТАВИТЬ СЮДА

            if (response.status === "success") {
                showSuccessModal(response.message);
                $("#feedbackForm")[0].reset();
                loadData();
            } else {
                showErrorModal(response.message);
            }
        }
        });
    });

    $("#refreshBtn").click(function() {
        loadData();
    });

    setInterval(loadData, 10000);
});

// ===== GET =====
function loadData() {
    $.ajax({
        url: "../pages/ajax.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
            let html = "";

            if (data.length === 0) {
                html = "<p>Нет сообщений</p>";
            } else {
                data.forEach(function(item) {
                    html += `
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>${item.name}</h5>
                                    <p>${item.email}</p>
                                    <p>${item.message}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });
            }

            $("#data-container").html(html);
        }
    });
    
}

// ===== МОДАЛКИ =====
function showSuccessModal(message) {
    $("#successModal .modal-body").text(message);
    new bootstrap.Modal(document.getElementById('successModal')).show();
}

function showErrorModal(message) {
    $("#errorModalBody").text(message);
    new bootstrap.Modal(document.getElementById('errorModal')).show();
}

console.log("AJAX START");
