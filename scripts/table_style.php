<?php
// Checking the value if the cookie and set the color of the table depending on the cookies
if (isset($_COOKIE['theme']) && ($_COOKIE['theme'] == 'dark')) {
    $table_background_color = '#222222';
    $table_text_color = '#ffffff';
    $table_header_background_color = '#d00a27';
    $table_row_background = "#808080";
    $logo_background = "brightness(200%)";
    $table_header_text_color = '#ffffff';
    $table_hover_color = '#666666';
    $text_title_color = '#ffffff';
} else {
    $table_background_color = '#f9f9f9';
    $table_text_color = '#000000';
    $table_header_background_color = '#d00a27';
    $table_row_background = "#F2F2F2";
    $table_header_text_color = '#ffffff';
    $logo_background = "brightness(50%)";
    $table_hover_color = '#EAEAEA';
    $text_title_color = '#000000';
}
?>
<style>
    .tables {
        border-collapse: collapse;
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
        background-color:
            <?php echo $table_background_color; ?>
        ;
        color:
            <?php echo $table_text_color; ?>
        ;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    th {
        text-align: left;
        font-weight: bold;
        padding: 10px;
        border: 1px solid #ccc;
        background-color:
            <?php echo $table_header_background_color; ?>
        ;
        color:
            <?php echo $table_header_text_color; ?>
        ;
    }

    td {
        padding: 10px;
        border: 1px solid #ccc;
    }

    tr:nth-child(even) {
        background-color:
            <?php echo $table_row_background; ?>
        ;
    }

    tr:hover {
        background-color:
            <?php echo $table_hover_color; ?>
        ;
    }

    /* Tables responsiveness */
    @media only screen and (max-width: 1000px) {
        table.tables {
            font-size: 0.8rem;
        }

        th,
        td {
            padding: 5px;
        }
    }

    /* Tables responsiveness */
    @media only screen and (max-width: 600px) {
        table.tables {
            font-size: 0.5rem;
        }

        th,
        td {
            padding: 3px;
        }
    }

    #league-title {
        color:
            <?php echo $text_title_color; ?>
        ;
    }

    .competition-logo-container {
        filter:
            <?php echo $logo_background; ?>
        ;
    }
</style>