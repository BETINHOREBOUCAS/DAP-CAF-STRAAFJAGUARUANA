var cpfInput2 = document.getElementById("inputCPF2");

cpfInput2.addEventListener("input", () => {
    let cpfValue = cpfInput2.value;
    let numeric = cpfValue.replace(/[^0-9]+/g, '');
    let cpfLength = numeric.length;

    let partOne = numeric.slice(0, 3) + ".";
    let partTwo = numeric.slice(3, 6) + ".";
    let partThree = numeric.slice(6, 9) + "-";

    if (cpfLength < 4) {
        cpfInput2.value = numeric;
    } else if (cpfLength >= 4 && cpfLength < 7) {
        let formatCPF = partOne +
            numeric.slice(3);
        cpfInput2.value = formatCPF;
    } else if (cpfLength >= 7 && cpfLength < 10) {
        let formatCPF = partOne +
            partTwo +
            numeric.slice(6);
        cpfInput2.value = formatCPF;
    } else if (cpfLength >= 10 && cpfLength < 12) {
        let formatCPF = partOne +
            partTwo +
            partThree +
            numeric.slice(9);
        cpfInput2.value = formatCPF;
    } else if (cpfLength >= 12) {
        let formatCPF = partOne +
            partTwo +
            partThree +
            numeric.slice(9, 11);
        cpfInput2.value = formatCPF;
    }
});

if (document.getElementById("inputCPF3")) {
    var cpfInput3 = document.getElementById("inputCPF3");

    cpfInput3.addEventListener("input", () => {
        let cpfValue = cpfInput3.value;
        let numeric = cpfValue.replace(/[^0-9]+/g, '');
        let cpfLength = numeric.length;

        let partOne = numeric.slice(0, 3) + ".";
        let partTwo = numeric.slice(3, 6) + ".";
        let partThree = numeric.slice(6, 9) + "-";

        if (cpfLength < 4) {
            cpfInput3.value = numeric;
        } else if (cpfLength >= 4 && cpfLength < 7) {
            let formatCPF = partOne +
                numeric.slice(3);
            cpfInput3.value = formatCPF;
        } else if (cpfLength >= 7 && cpfLength < 10) {
            let formatCPF = partOne +
                partTwo +
                numeric.slice(6);
            cpfInput3.value = formatCPF;
        } else if (cpfLength >= 10 && cpfLength < 12) {
            let formatCPF = partOne +
                partTwo +
                partThree +
                numeric.slice(9);
            cpfInput3.value = formatCPF;
        } else if (cpfLength >= 12) {
            let formatCPF = partOne +
                partTwo +
                partThree +
                numeric.slice(9, 11);
            cpfInput3.value = formatCPF;
        }
    });
}


