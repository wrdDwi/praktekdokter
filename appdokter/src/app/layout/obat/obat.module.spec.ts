import { ObatModule } from './obat.module';

describe('ObatModule', () => {
  let obatModule: ObatModule;

  beforeEach(() => {
    obatModule = new ObatModule();
  });

  it('should create an instance', () => {
    expect(obatModule).toBeTruthy();
  });
});
