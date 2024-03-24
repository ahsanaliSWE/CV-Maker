// Taking elements from HTML 
const inputField = document.querySelector(".inputField"); 
const main = document.querySelector(".resume-builder"); 
const outputContainer = document.querySelector(".output_container"); 

let isHidden = true; 

// Function to toggle between input form and resume preview 
function hide() { 
    if (isHidden) { 
        
        // Hide the input form and show the resume preview 
        main.style.display = "none"; 
        isHidden = false; 

        outputContainer.style.display = "block"; 
        outputContainer.innerHTML = ` 
            <div class="output" style="font-family: Arial, sans-serif; color: #333; padding: 20px; background-color: #f4f4f4; border-radius: 10px;"> 
                <div class="heading" style="text-align: left; margin-bottom: 20px;"> 
                    <h1 style="font-size: 26px; font-weight: bold; color: rgba(34, 95, 209, 0.945); margin-bottom: 5px;">${inputField["name"].value}</h1> 
                    <h4 style="font-size: 18px;">${inputField["designation"].value}</h4> 
                    <hr style="border: 1px solid #ccc; margin: 20px 0;"> <!-- Horizontal line -->
                </div> 
                <div class="info"> 
                    <div class="left"> 
                        <div class="box" style="margin-bottom: 20px;"> 
                            <h2 style="font-size: 20px; font-weight: bold; color: rgba(34, 95, 209, 0.945); margin-bottom: 10px;">Objective</h2> 
                            <p style="font-size: 16px; color: #555;">${inputField["objective"].value}</p> 
                        </div> 
                        <div class="box" style="margin-bottom: 20px;"> 
                            <h2 style="font-size: 20px; font-weight: bold; color: rgba(34, 95, 209, 0.945); margin-bottom: 10px;">Skills</h2> 
                            <p style="font-size: 16px; color: #555;">${inputField["skills"].value}</p> 
                        </div> 
                        <div class="box" style="margin-bottom: 20px;"> 
                            <h2 style="font-size: 20px; font-weight: bold; color: rgba(34, 95, 209, 0.945); margin-bottom: 10px;">Academic Details</h2> 
                            <p style="font-size: 16px; color: #555;">${inputField["academic_details"].value}</p> 
                        </div> 
                        <div class="box" style="margin-bottom: 20px;"> 
                            <h2 style="font-size: 20px; font-weight: bold; color: rgba(34, 95, 209, 0.945); margin-bottom: 10px;">Contact</h2> 
                            <p style="font-size: 16px; color: #555;">${inputField["contact"].value}</p> 
                        </div> 
                    </div> 
                    <div class="right"> 
                        <div class="box" style="margin-bottom: 20px;"> 
                            <h2 style="font-size: 20px; font-weight: bold; color: rgba(34, 95, 209, 0.945); margin-bottom: 10px;">Work Experience</h2> 
                            <p style="font-size: 16px; color: #555;">${inputField["work_experience"].value}</p> 
                        </div> 
                        <div class="box" style="margin-bottom: 20px;"> 
                            <h2 style="font-size: 20px; font-weight: bold; color: rgba(34, 95, 209, 0.945); margin-bottom: 10px;">Achievements</h2> 
                            <p style="font-size: 16px; color: #555;">${inputField["achievements"].value}</p> 
                        </div> 
                        <div class="box" style="margin-bottom: 20px;"> 
                            <h2 style="font-size: 20px; font-weight: bold; color: rgba(34, 95, 209, 0.945); margin-bottom: 10px;">Projects</h2> 
                            <p style="font-size: 16px; color: #555;">${inputField["projects"].value}</p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
            <button onclick="print()" style="background-color: rgba(34, 95, 209, 0.945); color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin-top: 20px;">Print Resume</button> 
        `; 
    } else { 
        // Show the input form and hide the resume preview 
        main.style.display = "block"; 
        isHidden = true; 

        outputContainer.style.display = "none"; 
        outputContainer.innerHTML = ""; 
    } 
}
