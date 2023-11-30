<style>
    .btn {
        display: inline-flex;
        padding: 5px 10px;
        border: solid 1px #000;
        background: #000;
        color: #fff !important;
        text-decoration: none !important;
    }

    .btn-sm {
        display: inline-flex;
        padding: 5px 10px;
        border: solid 1px #000;
        background: #000;
        color: #fff !important;
        text-decoration: none !important;
        margin: 0 3px;
        text-align: center;
    }

    .btn-sm-red {
        background: red;
        border: red;
    }

    .event-items {
        width: 100%;
        list-style-type: none;
        margin: 10px 0 !important;
    }

    .event-item {
        box-sizing: border-box;
        padding: 5px;
        align-items: center;
        margin: 0;
        background: #fafafa;
        border: solid 1px #ddd;
        display: grid;
        grid-template-columns: 1fr 100px 100px;
    }

    .no-italics {
        font-style: normal;
    }
</style>


<h3><span class="no-italics">📅</span> CurrentEvents List</h3>

<a href="<?php echo DOMAIN_ADMIN; ?>plugin/currentevents?addevent" class="btn">Add Event ➕ </a>
<a href="<?php echo DOMAIN_ADMIN; ?>configure-plugin/currentEvents" class="btn">Settings ⚙️</a>
<a href="<?php echo DOMAIN_ADMIN; ?>plugin/currentevents?howto" class="btn">Help </a>

<ul class="event-items p-0">
    <?php
    if (!empty(glob(PATH_CONTENT . 'current-events/*.json'))) {
        foreach (glob(PATH_CONTENT . 'current-events/*.json') as $key => $file) {
            $data = json_decode(file_get_contents($file));

            echo '<li class="event-item"><b>' . $data->eventname . '</b> <a href="' . DOMAIN_ADMIN . '/plugin/currentevents?addevent&edit=' . pathinfo($file)['filename'] . '" class="btn-sm">Edit</a>
				<a href="' . DOMAIN_ADMIN . '/plugin/currentevents?delete=' . pathinfo($file)['filename'] . '" class="btn-sm btn-sm-red">Delete</a></li>';
        };
    };
    ?>
</ul>


<div class="col-md-12 mt-5 p-0">
    <script type='text/javascript' src='https://storage.ko-fi.com/cdn/widget/Widget_2.js'></script>
    <script type='text/javascript'>
        kofiwidget2.init('Support Me on Ko-fi', '#29abe0', 'I3I2RHQZS');
        kofiwidget2.draw();
    </script>
</div>