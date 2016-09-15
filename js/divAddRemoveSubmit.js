$(window).load(function(){
// Add a new repeating section
var attrs = ['for', 'id', 'value'];
function resetAttributeNames(section) {
    var tags = section.find('input, label, h3'), idx = section.index();
    tags.each(function() {
      var $this = $(this);
      $this.html($this.html().replace(/Work Activity \d/g,"Work Activity " + (parseInt($('#workactivityCount').val()) + 1)));
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
        var toRepeatingGroup = $('.tocopy').first();
        var lastRepeatingGroup = $('.repeatingSection').last();
        var cloned = toRepeatingGroup.clone(true);
        cloned.insertAfter(lastRepeatingGroup);


        resetAttributeNames(cloned);


        var workactivityCount = $('#workactivityCount').val();
        var newworkactivityCount = parseInt(workactivityCount) +1;
        $('#workactivityCount').val(newworkactivityCount);

    });



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


        cloned.insertAfter($(this).parent('div'));
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
$('.deleteWorkActivity').click(function(e){
        e.preventDefault();
        var current_fight = $(this).parent('div');
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

//likelihood chnage
$('.likelihood').on('change', function()
{
  var likelihood = parseInt(this.value);
      var severity  =  parseInt($(this).parent().siblings().find('.severity').val());
      var riskValue = likelihood * severity;
      // console.log(severity);
     if(riskValue > 0 && riskValue < 4)
     {
        var htmlRisk = '<span class="green">Low Risk</span>';

     }
     else if(riskValue > 3 && riskValue < 13)
     {
        var htmlRisk = '<span class="yellow">Medium Risk</span>';
     }
     else if(riskValue > 13 && riskValue < 26)
     {
        var htmlRisk = '<span class="red">High Risk - Additional Risk Control is required below</span>';
     }
     else
     {
        var htmlRisk = '';
     }

 // alert(htmlRisk+$(this).parent().parent().siblings().find('.riskLevel').html());

// console.log($(this).parent().siblings().find('.riskLevel'));
// console.log($(this).parent().parent().siblings().find('.riskLevel'));

 $(this).parent().parent().parent().siblings().find('.riskLevel').empty().append(htmlRisk);


});


$('.severity').on('change', function()
{
	   // or $(this).val()
	  var severity = parseInt(this.value);
	  var likelihood  =  parseInt($(this).parent().siblings().find('.likelihood').val());
	  var riskValue = likelihood * severity;
    // console.log(likelihood);
	 if(riskValue > 0 && riskValue < 4)
	 {
	    var htmlRisk = '<span class="green">Low Risk</span>';

	 }
	 else if(riskValue > 3 && riskValue < 13)
	 {
	 	var htmlRisk = '<span class="yellow">Medium Risk</span>';
	 }
	 else if(riskValue > 13 && riskValue < 26)
	 {
	 	var htmlRisk = '<span class="red">High Risk - Additional Risk Control is required below</span>';
	 }
	 else
	 {
	 	var htmlRisk = '';
	 }


 console.log($(this).parent().siblings().find('.riskLevel').empty());


 $(this).parent().parent().parent().siblings().find('.riskLevel').empty().append(htmlRisk);

});





/*$('.date').each(function(e){

  attrName = $(this).attr("id");
alert(attrName);
    $(this).datepicker();
});*/


});//]]>
