<?php
echo "<h1>Hi hello</h1>";
?>

<h1>{{"hi hello"}}</h1>  

<?php /* i am comment */ ?>
{{-- i am comment --}}


<h1>{{10+10}}</h1>
<h1><?php echo 10+10; ?></h1>

<?php
/*
Blade Conditional Directives

@php @endphp  / <?php  ?>
@if , @elseif ,@else and @endif  
@unless , @endunless // inverse of if / opposite of if 
@isset @endisset  

*/
$name="Rajesh";
?>
@if($name=="Rajesh")
<h1>Hi my name is {{$name}}</h1>
@elseif($name=="Mahesh")
<h1>Hi my name is {{$name}}</h1>
@else
<h1>Unknown</h1>	
@endif


<?php
/*
Blade Looping Directives

@for and @endfor
@while and @endwhile
@foreach and @endforeach
@break @continue

*/
?>

@for($i=0;$i<=10;$i++)
<h1>{{$i}}</h1>
@endfor


<?php $users=['sam','raj','mahesh'];?>
@if(!empty($users))
    @foreach($users as $d)
    <h4>{{$d}}</h4>
    @endforeach
@endif    
