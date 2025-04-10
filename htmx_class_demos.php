<?php
// Include the HTMX helper class
require_once 'htmx_class.php';

// Demo page to showcase HTMX helper functions
if (!HTMX::isRequest()) {
    // Regular page load (not an HTMX request)
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HTMX Helper Demo</title>
        <!-- Include htmx library -->
        <script src="https://unpkg.com/htmx.org@1.9.6"></script>
        <style>
            body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
            .demo-section { margin-bottom: 30px; border: 1px solid #ddd; padding: 15px; border-radius: 5px; }
            button { padding: 8px 12px; background-color: #4CAF50; color: white; border: none; 
                    border-radius: 4px; cursor: pointer; margin-right: 5px; }
            button:hover { background-color: #45a049; }
            .result { margin-top: 10px; padding: 10px; background-color: #f8f9fa; min-height: 20px; }
            h2 { color: #333; }
            pre { background-color: #f5f5f5; padding: 10px; border-radius: 4px; overflow: auto; }
        </style>
    </head>
    <body>
        <h1>HTMX Helper Class Demo</h1>
        
        <div class="demo-section">
            <h2>Basic HTMX Request</h2>
            <p>Click the button to make an HTMX request and see request information.</p>
            <button hx-get="?action=get_request_info" 
                    hx-target="#request-info-result">
                Get Request Info
            </button>
            <div id="request-info-result" class="result">Result will appear here...</div>
        </div>
        
        <div class="demo-section">
            <h2>Form Submission</h2>
            <form hx-post="?action=handle_form" hx-target="#form-result">
                <input type="text" name="message" placeholder="Enter a message" required>
                <button type="submit">Submit Form</button>
            </form>
            <div id="form-result" class="result">Form result will appear here...</div>
        </div>
        
        <div class="demo-section">
            <h2>Triggering Events</h2>
            <button hx-get="?action=trigger_event" 
                    hx-target="#trigger-result">
                Trigger Server Event
            </button>
            <div id="trigger-result" class="result">Result will appear here...</div>
            <div id="notification-area" class="result">Notifications will appear here...</div>
            
            <script>
                document.body.addEventListener('myCustomEvent', function(evt) {
                    document.getElementById('notification-area').innerHTML = 
                        'Custom event received: ' + JSON.stringify(evt.detail);
                });
            </script>
        </div>
        
        <div class="demo-section">
            <h2>Response Control</h2>
            <button hx-get="?action=redirect" 
                    hx-target="#redirect-result">
                Redirect (will open https://example.com)
            </button>
            <button hx-get="?action=refresh" 
                    hx-target="#refresh-result">
                Refresh Page
            </button>
            <div id="redirect-result" class="result">Redirect result...</div>
            <div id="refresh-result" class="result">Refresh result...</div>
        </div>
        
        <div class="demo-section">
            <h2>Target Manipulation</h2>
            <button hx-get="?action=retarget" 
                    hx-target="#target-original">
                Retarget Response
            </button>
            <div id="target-original" class="result">Original target...</div>
            <div id="target-new" class="result">New target (will receive content instead)...</div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Handle HTMX requests based on action parameter
$action = $_GET['action'] ?? '';

switch ($action) {
    case 'get_request_info':
        // Demonstrate request detection methods
        $info = [
            'Is HTMX Request' => HTMX::isRequest() ? 'Yes' : 'No',
            'Is Boosted' => HTMX::isBoosted() ? 'Yes' : 'No',
            'Trigger' => HTMX::getTrigger() ?: 'None',
            'Trigger Name' => HTMX::getTriggerName() ?: 'None',
            'Target' => HTMX::getTarget() ?: 'None',
            'Current URL' => HTMX::getCurrentUrl() ?: 'None',
            'Request Method' => HTMX::getRequestMethod(),
            'Is History Restore' => HTMX::isHistoryRestore() ? 'Yes' : 'No',
            'Is GET' => HTMX::isGet() ? 'Yes' : 'No',
            'Is POST' => HTMX::isPost() ? 'Yes' : 'No'
        ];
        
        echo '<h3>Request Information</h3>';
        echo '<pre>' . htmlspecialchars(print_r($info, true)) . '</pre>';
        break;
        
    case 'handle_form':
        // Demonstrate form handling
        $message = htmlspecialchars($_POST['message'] ?? 'No message provided');
        
        echo '<h3>Form Submitted</h3>';
        echo '<p>You said: ' . $message . '</p>';
        
        // Demonstrate reswap
        HTMX::reswap('outerHTML');
        break;
        
    case 'trigger_event':
        // Demonstrate event triggering
        echo '<p>Server triggered a custom event!</p>';
        
        // Send a custom event to the client
        HTMX::trigger('myCustomEvent', [
            'message' => 'Hello from the server',
            'timestamp' => date('H:i:s')
        ]);
        break;
        
    case 'redirect':
        // Demonstrate redirect
        HTMX::redirect('https://example.com');
        echo '<p>Redirecting you to example.com...</p>';
        break;
        
    case 'refresh':
        // Demonstrate page refresh
        HTMX::refresh();
        echo '<p>Refreshing the page...</p>';
        break;
        
    case 'retarget':
        // Demonstrate retargeting
        echo '<p>This content was retargeted to a different element!</p>';
        HTMX::retarget('#target-new');
        break;
        
    default:
        echo '<p>Unknown action requested.</p>';
        break;
}
