import { Component, OnInit, Input } from '@angular/core';
import { Page } from 'src/app/interface/page';

@Component({
  selector: 'nds-container',
  templateUrl: './container.component.html',
  styleUrls: ['./container.component.css']
})
export class ContainerComponent implements OnInit {

  @Input('content') contentContainer: Page;

  constructor() { }

  ngOnInit(): void {
  }

}
