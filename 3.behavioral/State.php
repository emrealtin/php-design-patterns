<?php
interface State {
    public function handle();
}

class Context {
    private State $state;

    public function setState(State $state) {
        $this->state = $state;
    }

    public function requestPrint() {
        $this->state->handle();
    }
}

class IdleState implements State {
    public function handle() {
        echo "Printer is idle and ready to print.\n";
    }
}

class PrintingState implements State {
    public function handle() {
        echo "Printer is currently printing.\n";
    }
}

class ErrorState implements State {
    public function handle() {
        echo "Printer has encountered an error.\n";
    }
}

class OutOfPaperState implements State {
    public function handle() {
        echo "Printer is out of paper. Please refill the paper.\n";
    }
}

$printer = new Context();
$printer->setState(new IdleState());
$printer->requestPrint();

$printer->setState(new PrintingState());
$printer->requestPrint();

$printer->setState(new ErrorState());
$printer->requestPrint();

$printer->setState(new OutOfPaperState());
$printer->requestPrint();