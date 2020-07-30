import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'nds-container',
  templateUrl: './container.component.html',
  styleUrls: ['./container.component.css']
})
export class ContainerComponent implements OnInit {

  @Input('content') contentContainer: string;

  constructor() { }

  ngOnInit(): void {
  }

}
