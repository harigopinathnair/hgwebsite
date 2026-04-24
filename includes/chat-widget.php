<?php require_once __DIR__ . '/captcha.php'; ?>
<style>
/* Chat Widget Floating Icon */
.chat-widget-btn {
  position: fixed;
  bottom: 2rem;
  right: 2rem;
  width: 60px;
  height: 60px;
  background-color: var(--orange);
  color: #fff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 12px rgba(200, 81, 27, 0.4);
  cursor: pointer;
  z-index: 9999;
  transition: transform 0.2s, box-shadow 0.2s;
}
.chat-widget-btn:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 16px rgba(200, 81, 27, 0.6);
}
.chat-widget-btn svg { width: 30px; height: 30px; fill: currentColor; }

/* Chat Window */
.chat-window {
  position: fixed;
  bottom: 6rem;
  right: 2rem;
  width: 360px;
  max-height: 550px;
  height: 80vh;
  background: var(--card);
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.15);
  display: flex;
  flex-direction: column;
  z-index: 9999;
  overflow: hidden;
  opacity: 0;
  pointer-events: none;
  transform: translateY(20px);
  transition: all 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
  border: 1px solid var(--gray-border);
}
.chat-window.open {
  opacity: 1;
  pointer-events: auto;
  transform: translateY(0);
}
.chat-header {
  background: var(--navy);
  color: #fff;
  padding: 1.2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.chat-header h4 { margin: 0; color: #fff; font-size: 1.1rem; }
.chat-close { background: none; border: none; color: #fff; font-size: 1.5rem; line-height: 1; cursor: pointer; opacity: 0.7; }
.chat-close:hover { opacity: 1; }

.chat-body {
  flex: 1;
  overflow-y: auto;
  padding: 1.2rem;
  display: flex;
  flex-direction: column;
  background: var(--gray-bg);
}

/* Forms inside chat */
.chat-form-part { display: flex; flex-direction: column; gap: 0.8rem; height: 100%; justify-content: center; }
.chat-form-part label { font-size: 0.85rem; font-weight: 600; color: var(--text-dark); margin-bottom: -0.3rem; }
.chat-form-part input { padding: 0.8rem; font-size: 0.9rem; margin-bottom: 0; }
.chat-form-part button { margin-top: 0.5rem; width: 100%; }

/* Messages layout */
.chat-message-area { display: flex; flex-direction: column; gap: 0.8rem; }
.msg { max-width: 85%; padding: 0.8rem 1rem; border-radius: 12px; font-size: 0.9rem; line-height: 1.4; word-wrap: break-word; }
.msg.user { background: var(--orange); color: #fff; align-self: flex-end; border-bottom-right-radius: 2px; }
.msg.admin { background: #fff; color: var(--text-dark); align-self: flex-start; border-bottom-left-radius: 2px; border: 1px solid var(--gray-border); }

/* Input at bottom */
.chat-input-area {
  padding: 1rem;
  background: #fff;
  border-top: 1px solid var(--gray-border);
  display: flex;
  gap: 0.5rem;
}
.chat-input-area input {
  flex: 1; margin: 0; padding: 0.8rem; border-radius: 30px; font-size: 0.9rem;
}
.chat-input-area button {
  background: var(--orange); color: #fff; border: none; width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: 0.2s;
}
.chat-input-area button:hover { background: var(--orange-hover); }

@media (max-width: 480px) {
  .chat-window { bottom: 0; right: 0; width: 100%; height: 100%; border-radius: 0; max-height: 100%; }
  .chat-widget-btn { bottom: 1rem; right: 1rem; }
}
</style>

<div class="chat-widget-btn" id="chatBtn" title="Chat with us!">
  <svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H5.2L4 17.2V4h16v12z"/></svg>
</div>

<div class="chat-window" id="chatWindow">
  <div class="chat-header">
    <h4>Chat with Hari</h4>
    <button class="chat-close" id="chatClose">&times;</button>
  </div>
  
  <!-- Info Form -->
  <div class="chat-body" id="chatFormArea">
    <div class="chat-form-part">
      <p style="font-size: 0.95rem; margin-bottom: 0.5rem; text-align: center;">Got a question? Drop your details below and I'll be right with you!</p>
      
      <label>Name</label>
      <input type="text" id="cwName" placeholder="Your Name" required>
      
      <label>Email</label>
      <input type="email" id="cwEmail" placeholder="you@company.com" required>
      
      <label>Phone (optional)</label>
      <input type="text" id="cwPhone" placeholder="Phone number">
      
      <label>Location (optional)</label>
      <input type="text" id="cwLocation" placeholder="City or Country">

      <input type="text" id="cwHoneypot" name="website" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;height:0;width:0;pointer-events:none;">

      <button class="btn btn-primary" id="cwStartBtn">Start Chat</button>
    </div>
  </div>

  <!-- Chat Session -->
  <div class="chat-body" id="chatMessagesArea" style="display: none;">
    <div class="chat-message-area" id="chatMsgs">
      <!-- loaded via JS -->
    </div>
  </div>
  <form class="chat-input-area" id="chatInputArea" style="display: none;">
    <input type="text" id="cwInput" placeholder="Type your message..." autocomplete="off">
    <button type="submit"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg></button>
  </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const chatBtn       = document.getElementById('chatBtn');
    const chatWindow    = document.getElementById('chatWindow');
    const chatClose     = document.getElementById('chatClose');
    const formArea      = document.getElementById('chatFormArea');
    const msgArea       = document.getElementById('chatMessagesArea');
    const inputArea     = document.getElementById('chatInputArea');
    const chatMsgs      = document.getElementById('chatMsgs');
    const startBtn      = document.getElementById('cwStartBtn');
    const cwInput       = document.getElementById('cwInput');
    
    let chatToken  = localStorage.getItem('cw_token');
    let lastMsgId  = 0;
    let pollTimer  = null;

    chatBtn.addEventListener('click', () => {
        chatWindow.classList.toggle('open');
        if (chatWindow.classList.contains('open') && chatToken) {
            showChatBox();
            pollMessages();
        }
    });

    chatClose.addEventListener('click', () => chatWindow.classList.remove('open'));

    // If session exists
    if (chatToken) {
        showChatBox();
        pollMessages();
    }

    startBtn.addEventListener('click', async () => {
        const name  = document.getElementById('cwName').value.trim();
        const email = document.getElementById('cwEmail').value.trim();
        if (!name || !email) return alert('Name and email are required.');

        startBtn.disabled = true;
        startBtn.textContent = 'Starting...';

        const fd = new FormData();
        fd.append('action', 'start');
        fd.append('name', name);
        fd.append('email', email);
        fd.append('phone', document.getElementById('cwPhone').value);
        fd.append('location', document.getElementById('cwLocation').value);
        fd.append('page_url', window.location.href);
        fd.append('website', document.getElementById('cwHoneypot').value);

        try {
            const r = await fetch('/chat-api.php', { method: 'POST', body: fd });
            const data = await r.json();
            if (data.ok) {
                chatToken = data.token;
                localStorage.setItem('cw_token', chatToken);
                showChatBox();
                pollMessages();
            } else {
                alert(data.error || 'Failed to start chat.');
            }
        } catch (e) {
            alert('A network error occurred.');
        }
        startBtn.disabled = false;
        startBtn.textContent = 'Start Chat';
    });

    inputArea.addEventListener('submit', async (e) => {
        e.preventDefault();
        const text = cwInput.value.trim();
        if (!text || !chatToken) return;
        cwInput.value = '';
        
        appendMsg(text, 'user');
        
        const fd = new FormData();
        fd.append('action', 'send');
        fd.append('token', chatToken);
        fd.append('message', text);

        await fetch('/chat-api.php', { method: 'POST', body: fd });
        pollMessages();
    });

    function showChatBox() {
        formArea.style.display = 'none';
        msgArea.style.display = 'flex';
        inputArea.style.display = 'flex';
    }

    function appendMsg(text, sender) {
        const d = document.createElement('div');
        d.className = 'msg ' + sender;
        d.textContent = text;
        chatMsgs.appendChild(d);
        msgArea.scrollTop = msgArea.scrollHeight;
    }

    async function pollMessages() {
        if (!chatToken) return;
        try {
            const r = await fetch('/chat-api.php?action=poll&token=' + encodeURIComponent(chatToken) + '&last_id=' + lastMsgId);
            const data = await r.json();
            if (data.ok && data.messages) {
                data.messages.forEach(m => {
                    appendMsg(m.message, m.sender);
                    lastMsgId = Math.max(lastMsgId, parseInt(m.id));
                });
            }
        } catch (e) { }

        clearTimeout(pollTimer);
        pollTimer = setTimeout(pollMessages, 3000);
    }
});
</script>
