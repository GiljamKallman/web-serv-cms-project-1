<?php

# FEED PAGE
#
# Procedurally generates the feed page, determining how to generate it
# based on the app state information provided by the AppStateCentral -object.


?>

<div id="feed-container">
    <p>This is the feed. <?php echo 'Client ID: ' . $app_state_central->getClientId() ?></p>
</div>

