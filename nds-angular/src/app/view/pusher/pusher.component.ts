import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'nds-pusher',
  templateUrl: './pusher.component.html',
  styleUrls: ['./pusher.component.css']
})
export class PusherComponent implements OnInit {

  @Input('content') contentContainer: string;

  constructor() { }

  ngOnInit(): void {
  }

  teste(): void {
    console.log(this.contentContainer);
  }
}
