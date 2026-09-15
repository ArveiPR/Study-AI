// ===============================
// SEND MESSAGE
// ===============================
function sendMessage() {

    let messageInput = document.getElementById("message");
    let message = messageInput.value.trim();
    if(message === "") return;

    let chatBox = document.getElementById("chatBox");
    let typing = document.getElementById("typing-indicator");

    // tampilkan pesan user
    chatBox.innerHTML += `<div class="chat-message user">${message}</div>`;
    messageInput.value = "";
    chatBox.scrollTop = chatBox.scrollHeight;

    // tampilkan typing
    if(typing){
        typing.style.display = "flex";
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    fetch("api/send_private.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "message=" + encodeURIComponent(message)
    })
    .then(response => response.text())
    .then(data => {

    if(typing){
        typing.style.display = "none";
    }

    // buat container pesan AI kosong dulu
    let aiMessage = document.createElement("div");
    aiMessage.className = "chat-message ai";
    chatBox.appendChild(aiMessage);

    // fungsi streaming huruf
    let index = 0;

    function typeEffect() {
        if(index < data.length){
            aiMessage.innerHTML += data.charAt(index);
            index++;
            chatBox.scrollTop = chatBox.scrollHeight;
            setTimeout(typeEffect, 15); // speed (semakin kecil semakin cepat)
        }
    }

    typeEffect();
})
}


// ===============================
// ENTER TO SEND
// ===============================
document.addEventListener("DOMContentLoaded", function(){

    let messageInput = document.getElementById("message");

    if(messageInput){
        messageInput.addEventListener("keydown", function(event){
            if(event.key === "Enter"){
                event.preventDefault();
                sendMessage();
            }
        });
    }

});


// ===============================
// DARK MODE TOGGLE
// ===============================
document.addEventListener("DOMContentLoaded", function(){

    const btn = document.getElementById("themeToggle");

    if(btn){
        btn.addEventListener("click", function(){

            document.body.classList.toggle("dark");

            if(document.body.classList.contains("dark")){
                btn.textContent = "💡";
            } else {
                btn.textContent = "🌙";
            }

        });
    }

});
// ===============================
// LOAD CHAT SAAT HALAMAN DIBUKA
// ===============================
document.addEventListener("DOMContentLoaded", function(){

    let chatBox = document.getElementById("chatBox");

    fetch("api/load_chat.php")
    .then(res => res.json())
    .then(data => {

        data.forEach(msg => {

            let div = document.createElement("div");
            div.className = "chat-message " + msg.sender;
            div.innerHTML = msg.message;

            chatBox.appendChild(div);
        });

        chatBox.scrollTop = chatBox.scrollHeight;
    });

});