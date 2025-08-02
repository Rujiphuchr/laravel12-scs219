@php
    $records = [60, 70, 80];
@endphp
@if (count($records) == 1)
    <div>I have one record! </div>
@elseif (count($records) > 1)
    <div>I have multiple records!</div>
@else
    <div>I don't have any records!</div>
@endif

<?php
$records = [60, 70, 80];
?>
<?php if (count($records) == 1) { ?>
<div>I have one record! </div>
<?php }elseif (count($records) > 1) { ?>
<div>I have multiple records!</div>
<?php }else{ ?>
<div>I don't have any records!</div>
<?php } ?>
