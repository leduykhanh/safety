//<![CDATA[
$(window).load(function(){
// Add a new repeating section
var attrs = ['for', 'id', 'value'];
function resetAttributeNames(section) {
    var tags = section.find('input, label'), idx = section.index();
    tags.each(function() {
      var $this = $(this);
      $.each(attrs, function(i, attr) {
        var attr_val = $this.attr(attr);
        if (attr_val) {
            $this.attr(attr, attr_val.replace(/_\d+$/, '_'+(idx + 1)));



        }

      })


    })
}

function resetHazaradsAttributeNames(section) {
    var tags = section.find('input, label'), idx = section.index();
    tags.each(function() {
      var $this = $(this);
      $.each(attrs, function(i, attr) {
        var attr_val = $this.attr(attr);
        if (attr_val) {
            $this.attr(attr, attr_val.replace(/_\d+$/, '_'+(idx + 1)));



        }
      })


    })
}

$('.addMember').click(function(e){
        e.preventDefault();
        var MemberCount = $('#RA_MemberCount').val();
        if(MemberCount >= 5)
        {
           alert("You can't add more than 5 RA Member");
            return;
        }

        var toRepeatingGroup = $('.repeatingMember').first();
        var lastRepeatingGroup = $('.repeatingMember').last();
        var cloned = toRepeatingGroup.clone(true);
        cloned.insertAfter(lastRepeatingGroup);


        resetAttributeNames(cloned);



        var newMemberCount = parseInt(MemberCount) +1;
        $('#RA_MemberCount').val(newMemberCount);

    });


    $('.deleteMember').click(function(e){
        e.preventDefault();
        var current_fight = $(this).parent('div');
        var other_fights = current_fight.siblings('.repeatingMember');
        if (other_fights.length === 0) {
            alert("You should atleast have one RA Member");
            return;
        }
        current_fight.slideUp('slow', function() {
            current_fight.remove();
            var MemberCount = $('#RA_MemberCount').val();
            var newMemberCount = parseInt(MemberCount) -1;
            $('#RA_MemberCount').val(newMemberCount);
            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })



    });



$('.addWorkActivity').click(function(e){
        e.preventDefault();
		var i = 1;
		$('.workActivityName').each(function()
		{
			$(this).parent('div').html('<h3 class="workActivityName">Work Activity '+i+'</h3>');
			i = parseInt(i) + 1;
		});
		var nextI = $('.workActivityName').length;
		$('.workActivityNameCopy').parent('div').html('<h3 class="workActivityName">Work Activity '+i+'</h3>');
       var toRepeatingGroup = $('.tocopy').first();
       console.log(toRepeatingGroup);
        var lastRepeatingGroup = $('.repeatingSection').last();
        var cloned = toRepeatingGroup.clone(true);
        cloned.insertAfter(lastRepeatingGroup);
        resetAttributeNames(cloned);
        var workactivityCount = $('#workactivityCount').val();
        var newworkactivityCount = parseInt(workactivityCount) +1;
        $('#workactivityCount').val(newworkactivityCount);
        $('#workActivityNameCopy').html('<h3 class="workActivityNameCopy">Work Activity</h3>');

    });

  // Delete a repeating section
$('.deleteWorkActivity').click(function(e){
        e.preventDefault();
        var current_fight = $(this).parent().parent('div');
        var other_fights = current_fight.siblings('.repeatingSection');
        if (other_fights.length === 0) {
            alert("You should atleast have one workactivity");
            return;
        }

       current_fight.slideUp('slow', function() {
            current_fight.remove();

            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })
        var workactivityCount = $('#workactivityCount').val();
        var newworkactivityCount = parseInt(workactivityCount) -1;
        $('#workactivityCount').val(newworkactivityCount);
        resetAttributeNames($(this));

        changeWorkActivity();


       // var nextI = $('.workActivityName').length;
        //$('#workActivityNameCopy').html('<h3 class="workActivityName">Work Activity '+i+'</h3>');

        //$('#workActivityNameCopy').html('<h3 class="workActivityNameCopy">Work Activity</h3>');



    });
function changeWorkActivity()
{
    var i = 1;
        $('.workActivityName').each(function()
        {
            //alert('mrphpgeu');

            $(this).parent('div').html('<h3 class="workActivityName">Work Activity '+i+'</h3>');
            i = parseInt(i) + 1;
        });



}











$('.addHazards').click(function(e){
        e.preventDefault();

        var currentHazardCounts = $(this).parent().parent().find('#hazardsCount').val();
        var nextHzardsCounts = parseInt(currentHazardCounts) + 1;
        $(this).parent().parent().find('#hazardsCount').val(nextHzardsCounts);




        var lastRepeatingGroup = $('.hazardSectionCopy').first();
        var cloned = lastRepeatingGroup.clone(true)


        cloned.insertAfter($(this).parent('div'));
        resetHazaradsAttributeNames(cloned)
    });

$('.addActionMember').click(function(e){
        e.preventDefault();

        var currentHazardsActionOfficerCount = $(this).parent().parent().find('#hazardsActionOfficerCount').val();

        if(currentHazardsActionOfficerCount >= 5)
        {
           alert("You can't add more than 5 Action Officers");
            return;
        }

        var nextHazardsActionOfficerCount = parseInt(currentHazardsActionOfficerCount) + 1;
        $(this).parent().parent().find('#hazardsActionOfficerCount').val(nextHazardsActionOfficerCount);




        var lastRepeatingGroup = $('.repeatingActionOfficer').last();
        var cloned = lastRepeatingGroup.clone(true)


        cloned.insertAfter($(this).parent().parent('div'));
        resetHazaradsAttributeNames(cloned)
    });

$('.deleteActonOfficer').click(function(e){
        e.preventDefault();
        var current_fight = $(this).parent('div');
        var other_fights = current_fight.siblings('.repeatingActionOfficer');
        if (other_fights.length === 0) {
            alert("You should atleast have one Action officer Member");
            return;
        }
        current_fight.slideUp('slow', function() {
              var currentHazardsActionOfficerCount = $(this).parent().parent().find('#hazardsActionOfficerCount').val();
             var nextHazardsActionOfficerCount = parseInt(currentHazardsActionOfficerCount) - 1;
            $(this).parent().parent().find('#hazardsActionOfficerCount').val(nextHazardsActionOfficerCount);
            current_fight.remove();


            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })



    });










// Delete a repeating section
$('.deleteHazards').click(function(e){
        e.preventDefault();

        var current_fight = $(this).parent('div');
        var other_fights = current_fight.siblings('.hazardSection');
        if (other_fights.length === 0) {
            alert("You should atleast have one hazards");
            return;
        }
        current_fight.slideUp('slow', function() {
            current_fight.remove();

            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })

        var currentHazardCounts = $(this).parent().parent().find('#hazardsCount').val();
        var nextHzardsCounts = parseInt(currentHazardCounts) - 1;
        $(this).parent().parent().find('#hazardsCount').val(nextHzardsCounts);


    });




$(".date").datepicker();
function getRiskLeverl(severity,likelihood,template){
  var riskValue = likelihood * severity;
  var htmlRisk = '';
  if(riskValue > 0 && riskValue < 4)
  {
    if(template=="1")
      htmlRisk = '<span class="red">High Risk - Additional Risk Control is required below</span>';
    else
     htmlRisk = '<span class="green">Low Risk</span>';

  }
  else if(riskValue > 3 && riskValue < 13)
  {
   htmlRisk = '<span class="yellow">Medium Risk</span>';
  }
  else if(riskValue > 13 && riskValue < 26)
  {
    if(template=="1")
     htmlRisk = '<span class="green">Low Risk</span>';
    else
   htmlRisk = '<span class="red">High Risk - Additional Risk Control is required below</span>';
  }
  else
  {
   htmlRisk = '';
  }
  return htmlRisk;
}
//likelihood chnage
$('.likelihood').on('change', function()
{
  var likelihood = parseInt(this.value);
      var severity  =  parseInt($(this).parent().siblings().find('.severity').val());
      var riskValue = likelihood * severity;
      var htmlRisk = getRiskLeverl(severity,likelihood,"1");

 //alert(htmlRisk+$(this).parent().parent().siblings().find('.riskLevel').html());



 $(this).parent().parent().siblings().find('.riskLevel').empty().append(htmlRisk);


});


$('.severity').on('change', function()
{
       // or $(this).val()
      var severity = parseInt(this.value);
      var likelihood  =  parseInt($(this).parent().siblings().find('.likelihood').val());
      var riskValue = likelihood * severity;
      var htmlRisk = getRiskLeverl(severity,likelihood,"1");

 //alert(htmlRisk+$(this).parent().parent().siblings().find('.riskLevel').html());



 $(this).parent().parent().siblings().find('.riskLevel').empty().append(htmlRisk);

});


/*$('.date').each(function(e){

  attrName = $(this).attr("id");
alert(attrName);
    $(this).datepicker();
});*/


});//]]>
