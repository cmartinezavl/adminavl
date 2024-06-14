const DOMstrings = {
  stepsBtnClass: "multisteps-form__progress-btn",
  stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
  stepsBar: document.querySelector(".multisteps-form__progress"),
  stepsForm: document.querySelector(".multisteps-form__form"),
  stepsFormTextareas: document.querySelectorAll(".multisteps-form__textarea"),
  stepFormPanelClass: "multisteps-form__panel",
  stepFormPanels: document.querySelectorAll(".multisteps-form__panel"),
  stepPrevBtnClass: "js-btn-prev",
  stepNextBtnClass: "js-btn-next",
};
const removeClasses = (elemSet, className) => {
  elemSet.forEach((elem) => {
    elem.classList.remove(className);
  });
};
const findParent = (elem, parentClass) => {
  let currentNode = elem;
  while (!currentNode.classList.contains(parentClass)) {
    currentNode = currentNode.parentNode;
  }
  return currentNode;
};
const getActiveStep = (elem) => {
  return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};
const setActiveStep = (activeStepNum) => {
  removeClasses(DOMstrings.stepsBtns, "js-active");
  DOMstrings.stepsBtns.forEach((elem, index) => {
    if (index <= activeStepNum) {
      elem.classList.add("js-active");
    }
  });
};
const setActivePanel = (activePanelNum) => {
  removeClasses(DOMstrings.stepFormPanels, "js-active");
  DOMstrings.stepFormPanels.forEach((elem, index) => {
      if (index === activePanelNum) {
          elem.classList.add("js-active");
          elem.style.display = "block";

      }else{
        elem.style.display = "none";
      }
  });
};

DOMstrings.stepsBar.addEventListener("click", (e) => {
  const eventTarget = e.target;
  if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
    return;
  }
  const activeStep = getActiveStep(eventTarget);
  setActiveStep(activeStep);
  setActivePanel(activeStep);
});
DOMstrings.stepsForm.addEventListener("click", (e) => {
  const eventTarget = e.target;
  if (
    !(
      eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) ||
      eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)
    )
  ) {
    return;
  }
  const activePanel = findParent(
    eventTarget,
    `${DOMstrings.stepFormPanelClass}`
  );
  let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(
    activePanel
  );
  if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
    activePanelNum--;
  } else {
    activePanelNum++;
  }
  setActiveStep(activePanelNum);
  setActivePanel(activePanelNum);
});

window.addEventListener("load", setActivePanel(0), false);
window.addEventListener("resize", setActivePanel(0), false);
