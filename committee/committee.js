console.log("<?php echo $result; ?>");
$(document).ready(function () {
  $("#submitBtn").click(function () {
    getEligibleStudents();
  });
});

function getEligibleStudents() {
  $.ajax({
    url: "getEligibleStudents.php",
    type: "post",
    success: function (data) {
      var eligibleStudents = JSON.parse(data);
      var winner = selectWinner(eligibleStudents);
      if (winner.length > 1) {
        console.log("time to vote");
        $("#winner").text(
          "The system has found two students of equal qualifications: " +
            winner[0].firstName +
            " " +
            winner[0].lastName +
            " and " + winner[1].firstName +
            " " + winner[1].lastName + ". Please review each candidate and cast your vote" +
            " at vote@bstscholarship.com" );
  
      } else {
        console.log("one winner");
        $("#winner").text(
          "The winner is " +
            winner.firstName +
            " " +
            winner.lastName +
            "." +
            " The system has emailed them at " +
            winner.email
        );
      }
    },
    error: function (error) {
      reject(error);
    },
  });
}

function selectWinner(eligibleStudents) {
  if (eligibleStudents.length == 1) {
    return eligibleStudents[0];
  }
  //filtering by highest cumulative GPA
  else {
    if (eligibleStudents[0].cumulativeGpa > eligibleStudents[1].cumulativeGpa) {
      return eligibleStudents[0];
    } else {
      eligibleStudents = eligibleStudents.filter(
        (x) => x.cumulativeGpa == eligibleStudents[0].cumulativeGpa
      );
      if (eligibleStudents.length == 1) {
        return eligibleStudents[0];
      } 
      //filtering by highest semester gpa
      else {
        eligibleStudents.sort(
          (a, b) => parseFloat(b.gpaSemester) - parseFloat(a.gpaSemester)
        );
        if (eligibleStudents[0].gpaSemester > eligibleStudents[1].gpaSemester) {
          return eligibleStudents[0];
        }
        else{
          eligibleStudents = eligibleStudents.filter(
            (x) => x.gpaSemester == eligibleStudents[0].gpaSemester
          );
          
          //filtering by class status
          let juniorStudents = eligibleStudents.filter(
            (x) => x.classStatus === "Junior"
          );

          if (juniorStudents.length == 1) {
            return juniorStudents[0];
          }
          //filter for females
          else {
            let femaleStudents = eligibleStudents.filter(
              (x) => x.gender === "Female"
            );

            if (femaleStudents.length == 1) {
              return femaleStudents[0];
            }

            //too many qualified students.. lets pick the two youngest! time for the committee to vote on the top two!
            else {
              let voteStudents = eligibleStudents.sort(function (a, b) {
                return new Date(b.dateOfBirth) - new Date(a.dateOfBirth);
              });
              return [voteStudents[0], voteStudents[1]];
            }
          }
        }
      }
    }
  }
}
