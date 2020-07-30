import Calculator from "./calculator";

const calculator = new Calculator();

document.getElementById("sum").onclick = () => {
    const numberOne = Number(
        (<HTMLInputElement>document.getElementById("numberOne")).value
    );

    const numberTwo = Number(
        (<HTMLInputElement>document.getElementById("numberTwo")).value
    );
    const result: number = calculator.sum(numberOne, numberTwo);

    (<HTMLInputElement>document.getElementById("result")).value = result.toString();
}

document.getElementById("subtract").onclick = () => {
    const numberOne = Number(
        (<HTMLInputElement>document.getElementById("numberOne")).value
    );

    const numberTwo = Number(
        (<HTMLInputElement>document.getElementById("numberTwo")).value
    );
    const result: number = calculator.subtract(numberOne, numberTwo);

    (<HTMLInputElement>document.getElementById("result")).value = result.toString();
}

document.getElementById("multiply").onclick = () => {
    const numberOne = Number(
        (<HTMLInputElement>document.getElementById("numberOne")).value
    );

    const numberTwo = Number(
        (<HTMLInputElement>document.getElementById("numberTwo")).value
    );
    const result: number = calculator.multiply(numberOne, numberTwo);

    (<HTMLInputElement>document.getElementById("result")).value = result.toString();
}

document.getElementById("divide").onclick = () => {
    const numberOne = Number(
        (<HTMLInputElement>document.getElementById("numberOne")).value
    );

    const numberTwo = Number(
        (<HTMLInputElement>document.getElementById("numberTwo")).value
    );
    const result: number = calculator.divide(numberOne, numberTwo);

    (<HTMLInputElement>document.getElementById("result")).value = result.toString();
}
