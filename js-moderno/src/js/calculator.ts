function contadorUser(value: number) {
    return (target: any, propertyKey: string, descriptor: PropertyDescriptor) => {
        console.log('opaaa')
        return 1
    }
}

class Calculator {
    pi: number;

    sum(numberOne: number, numberTwo:number): number {
        return numberOne + numberTwo;
    }

    subtract(numberOne: number, numberTwo:number): number {
        return numberOne - numberTwo;
    }

    multiply(numberOne: number, numberTwo:number): number {
        return numberOne * numberTwo;
    }

    divide(numberOne: number, numberTwo:number): number {
        return numberOne / numberTwo;
    }
}

export default Calculator;