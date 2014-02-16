//--------------------------------------------------------------------
//LỚP PIECE biểu diễn QUÂN CỜ
//--------------------------------------------------------------------
//Name: tên quân cờ {King, Rook, Bishop, Elephant, Canon, Horse, Pawn}
//Type: màu quân cờ {R, G} tương đương với {Đỏ, Xanh}
//X, Y: vị trí quân cờ, vị trí ảo chưa tính tọa độ thực tế.
function Board(Name, XStart, YStart){
	this.Name 			= Name;
	this.XStart			= XStart;
	this.YStart			= YStart;
	this.nWidthCell  	= 48;
	this.nHeightCell	= 48;
	this.nWPiece  		= 32;
	this.nHPiece 		= 32;
	this.Space			= 2;
	this.Stick			= 4;
	this.APiece 		= [];
	
	//VỊ TRÍ PHÂN BỔ CỦA QUÂN ĐỎ (2) VÀ QUÂN XANH (1)
	this.State			= [
		[1,	1, 1, 1, 1, 1, 1, 1, 1],
		[0,	0, 0, 0, 0, 0, 0, 0, 0],
		[0,	1, 0, 0, 0, 0, 0, 1, 0],
		[1,	0, 1, 0, 1, 0, 1, 0, 1],
		[0,	0, 0, 0, 0, 0, 0, 0, 0],
		[0,	0, 0, 0, 0, 0, 0, 0, 0],
		[2,	0, 2, 0, 2, 0, 2, 0, 2],
		[0,	2, 0, 0, 0, 0, 0, 2, 0],
		[0,	0, 0, 0, 0, 0, 0, 0, 0],
		[2,	2, 2, 2, 2, 2, 2, 2, 2]
	];
	
	//VỊ TRÍ PHÂN BỔ CỦA CÁC ĐỐI TƯỢNG QUÂN CỜ [0...31] VỊ TRÍ CỦA QUÂN CỜ | -1 LÀ VỊ TRÍ TRỐNG
	this.Object	= [
		[ 7,  5,  3,  1,  0,  2,  4,  6,  8],
		[-1, -1, -1, -1, -1, -1, -1, -1, -1],
		[-1,  9, -1, -1, -1, -1, -1, 10, -1],
		[11, -1, 12, -1, 13, -1, 14, -1, 15],
		[-1, -1, -1, -1, -1, -1, -1, -1, -1],
		[-1, -1, -1, -1, -1, -1, -1, -1, -1],
		[27, -1, 28, -1, 29, -1, 30, -1, 31],
		[-1, 25, -1, -1, -1, -1, -1, 26, -1],
		[-1, -1, -1, -1, -1, -1, -1, -1, -1],
		[23, 21, 19, 17, 16, 18, 20, 22, 24]
	];
		
		
	this.getX2Canvas 	= function(X) {return this.XStart + X*this.nWidthCell + X*this.Space;}
	this.getY2Canvas	= function(Y){return this.YStart + Y*this.nHeightCell + Y*this.Space;}
		
	//--------------------------------------------------------------------
	//KHỞI TẠO BÀN CỜ
	//--------------------------------------------------------------------
	this.init 			= function(){
		this.APiece[0] = 	new Piece("King", 		"G", 4, 0);
		this.APiece[1] = 	new Piece("Bishop", 	"G", 3, 0);
		this.APiece[2] = 	new Piece("Bishop", 	"G", 5, 0);
		this.APiece[3] = 	new Piece("Elephant", 	"G", 2, 0);
		this.APiece[4] = 	new Piece("Elephant", 	"G", 6, 0);
		this.APiece[5] = 	new Piece("Horse", 		"G", 1, 0);
		this.APiece[6] = 	new Piece("Horse", 		"G", 7, 0);
		this.APiece[7] = 	new Piece("Rook", 		"G", 0, 0);
		this.APiece[8] = 	new Piece("Rook", 		"G", 8, 0);
		this.APiece[9] = 	new Piece("Canon", 		"G", 1, 2);
		this.APiece[10] = 	new Piece("Canon", 		"G", 7, 2);
		this.APiece[11] = 	new Piece("Pawn", 		"G", 0, 3); 
		this.APiece[12] = 	new Piece("Pawn", 		"G", 2, 3); 
		this.APiece[13] = 	new Piece("Pawn", 		"G", 4, 3); 
		this.APiece[14] = 	new Piece("Pawn", 		"G", 6, 3); 
		this.APiece[15] = 	new Piece("Pawn", 		"G", 8, 3);
			
		this.APiece[16] = 	new Piece("King", 		"R", 4, 9);
		this.APiece[17] = 	new Piece("Bishop", 	"R", 3, 9);
		this.APiece[18] = 	new Piece("Bishop", 	"R", 5, 9);
		this.APiece[19] = 	new Piece("Elephant", 	"R", 2, 9);
		this.APiece[20] = 	new Piece("Elephant", 	"R", 6, 9);
		this.APiece[21] = 	new Piece("Horse", 		"R", 1, 9);
		this.APiece[22] = 	new Piece("Horse", 		"R", 7, 9);
		this.APiece[23] = 	new Piece("Rook", 		"R", 0, 9);
		this.APiece[24] = 	new Piece("Rook", 		"R", 8, 9);
		this.APiece[25] = 	new Piece("Canon", 		"R", 1, 7);
		this.APiece[26] = 	new Piece("Canon", 		"R", 7, 7);
		this.APiece[27] = 	new Piece("Pawn", 		"R", 0, 6); 
		this.APiece[28] = 	new Piece("Pawn", 		"R", 2, 6); 
		this.APiece[29] = 	new Piece("Pawn", 		"R", 4, 6); 
		this.APiece[30] = 	new Piece("Pawn", 		"R", 6, 6); 
		this.APiece[31] = 	new Piece("Pawn", 		"R", 8, 6);
						
	}
	
	//--------------------------------------------------------------------
	//DI CHUYỂN QUÂN CỜ
	//--------------------------------------------------------------------
	this.move = function(iPiece, XNew, YNew){
		this.APiece[iPiece].setXY(XNew, YNew);
	}
	
	//--------------------------------------------------------------------
	//VẼ BÀN CỜ
	//--------------------------------------------------------------------
	this.draw = function(canvas, context){		
		context.fillStyle = "lightblue";
		context.fill();
		//Vẽ các ô trong bàn cờ		
		for (var i=0; i<9; i++){
			for (var j=0; j<8; j++){
				context.fillRect( 
					this.XStart + j*(this.nWidthCell+this.Space), 
					this.YStart + i*(this.nHeightCell+this.Space), 
					this.nWidthCell, 
					this.nHeightCell
				);
			}
		}
		
		//===============================================================================
		//Vẽ các đường chéo, sông hà														
		//===============================================================================
		context.beginPath();
		//Chéo cung bên XANH
		context.moveTo(this.XStart + 3*(this.nWidthCell+this.Space)		, this.YStart + 0*(this.nHeightCell+this.Space));
		context.lineTo(this.XStart + 5*(this.nWidthCell+this.Space)-this.Space 	, this.YStart + 2*(this.nHeightCell+this.Space)-this.Space);
		context.moveTo(this.XStart + 5*(this.nWidthCell+this.Space)		, this.YStart + 0*(this.nHeightCell+this.Space));
		context.lineTo(this.XStart + 3*(this.nWidthCell+this.Space)-this.Space	, this.YStart + 2*(this.nHeightCell+this.Space)-this.Space);
			
		//Vị trí Pháo bên XANH
		context.moveTo(this.XStart + 1*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 2*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 1*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 2*(this.nHeightCell+this.Space)+this.Stick);			
		context.moveTo(this.XStart + 1*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 2*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 1*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 2*(this.nHeightCell+this.Space)+this.Stick);
			
		context.moveTo(this.XStart + 7*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 2*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 7*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 2*(this.nHeightCell+this.Space)+this.Stick);			
		context.moveTo(this.XStart + 7*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 2*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 7*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 2*(this.nHeightCell+this.Space)+this.Stick);
			
		//Vị trí Chốt bên XANH
		context.moveTo(this.XStart + 0*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 0*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)+this.Stick);
		context.moveTo(this.XStart + 0*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 0*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)+this.Stick);
		
		context.moveTo(this.XStart + 2*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 2*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)+this.Stick);
		context.moveTo(this.XStart + 2*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 2*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)+this.Stick);
		
		context.moveTo(this.XStart + 4*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 4*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)+this.Stick);
		context.moveTo(this.XStart + 4*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 4*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)+this.Stick);
		
		context.moveTo(this.XStart + 6*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 6*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)+this.Stick);
		context.moveTo(this.XStart + 6*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 6*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)+this.Stick);
		
		context.moveTo(this.XStart + 8*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 8*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)+this.Stick);
		context.moveTo(this.XStart + 8*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 8*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 3*(this.nHeightCell+this.Space)+this.Stick);
		
		//Chéo cung bên ĐỎ
		context.moveTo(this.XStart + 3*(this.nWidthCell+this.Space)		, this.YStart + 7*(this.nHeightCell+this.Space));
		context.lineTo(this.XStart + 5*(this.nWidthCell+this.Space)-this.Space 	, this.YStart + 9*(this.nHeightCell+this.Space)-this.Space);			
		context.moveTo(this.XStart + 3*(this.nWidthCell+this.Space)-this.Space	, this.YStart + 9*(this.nHeightCell+this.Space)-this.Space);
		context.lineTo(this.XStart + 5*(this.nWidthCell+this.Space)-this.Space 	, this.YStart + 7*(this.nHeightCell+this.Space)-this.Space);
		
		//Vị trí Pháo bên ĐỎ
		context.moveTo(this.XStart + 1*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 7*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 1*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 7*(this.nHeightCell+this.Space)+this.Stick);			
		context.moveTo(this.XStart + 1*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 7*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 1*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 7*(this.nHeightCell+this.Space)+this.Stick);
		
		context.moveTo(this.XStart + 7*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 7*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 7*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 7*(this.nHeightCell+this.Space)+this.Stick);			
		context.moveTo(this.XStart + 7*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 7*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 7*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 7*(this.nHeightCell+this.Space)+this.Stick);
		
		//Vị trí Chốt bên XANH
		context.moveTo(this.XStart + 0*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 0*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)+this.Stick);
		context.moveTo(this.XStart + 0*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 0*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)+this.Stick);
		
		context.moveTo(this.XStart + 2*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 2*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)+this.Stick);
		context.moveTo(this.XStart + 2*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 2*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)+this.Stick);
		
		context.moveTo(this.XStart + 4*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 4*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)+this.Stick);
		context.moveTo(this.XStart + 4*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 4*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)+this.Stick);
		
		context.moveTo(this.XStart + 6*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 6*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)+this.Stick);
		context.moveTo(this.XStart + 6*(this.nWidthCell+this.Space)+this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 6*(this.nWidthCell+this.Space)-this.Stick	, this.YStart + 6*(this.nHeightCell+this.Space)+this.Stick);
		
		context.moveTo(this.XStart + 8*(this.nWidthCell+this.Space)-this.Stick		, this.YStart + 6*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 8*(this.nWidthCell+this.Space)+this.Stick		, this.YStart + 6*(this.nHeightCell+this.Space)+this.Stick);
		context.moveTo(this.XStart + 8*(this.nWidthCell+this.Space)+this.Stick		, this.YStart + 6*(this.nHeightCell+this.Space)-this.Stick);
		context.lineTo(this.XStart + 8*(this.nWidthCell+this.Space)-this.Stick		, this.YStart + 6*(this.nHeightCell+this.Space)+this.Stick);
		
		//Vẽ HÀ
		context.moveTo(this.XStart + 0*(this.nWidthCell+this.Space)				, this.YStart + 4*(this.nHeightCell+this.Space));
		context.lineTo(this.XStart + 1*(this.nWidthCell+this.Space)-this.Space	, this.YStart + 5*(this.nHeightCell+this.Space)-this.Space);
		
		context.moveTo(this.XStart + 1*(this.nWidthCell+this.Space)				, this.YStart + 4*(this.nHeightCell+this.Space));
		context.lineTo(this.XStart + 2*(this.nWidthCell+this.Space)-this.Space	, this.YStart + 5*(this.nHeightCell+this.Space)-this.Space);
		
		context.moveTo(this.XStart + 2*(this.nWidthCell+this.Space)				, this.YStart + 4*(this.nHeightCell+this.Space));
		context.lineTo(this.XStart + 3*(this.nWidthCell+this.Space)-this.Space	, this.YStart + 5*(this.nHeightCell+this.Space)-this.Space);
		
		context.moveTo(this.XStart + 3*(this.nWidthCell+this.Space)				, this.YStart + 4*(this.nHeightCell+this.Space));
		context.lineTo(this.XStart + 4*(this.nWidthCell+this.Space)-this.Space	, this.YStart + 5*(this.nHeightCell+this.Space)-this.Space);
		
		context.moveTo(this.XStart + 4*(this.nWidthCell+this.Space)				, this.YStart + 4*(this.nHeightCell+this.Space));
		context.lineTo(this.XStart + 5*(this.nWidthCell+this.Space)-this.Space	, this.YStart + 5*(this.nHeightCell+this.Space)-this.Space);
		
		context.moveTo(this.XStart + 5*(this.nWidthCell+this.Space)				, this.YStart + 4*(this.nHeightCell+this.Space));
		context.lineTo(this.XStart + 6*(this.nWidthCell+this.Space)-this.Space	, this.YStart + 5*(this.nHeightCell+this.Space)-this.Space);
		
		context.moveTo(this.XStart + 6*(this.nWidthCell+this.Space)				, this.YStart + 4*(this.nHeightCell+this.Space));
		context.lineTo(this.XStart + 7*(this.nWidthCell+this.Space)-this.Space	, this.YStart + 5*(this.nHeightCell+this.Space)-this.Space);
		
		context.moveTo(this.XStart + 7*(this.nWidthCell+this.Space)				, this.YStart + 4*(this.nHeightCell+this.Space));
		context.lineTo(this.XStart + 8*(this.nWidthCell+this.Space)-this.Space	, this.YStart + 5*(this.nHeightCell+this.Space)-this.Space);
								
		context.stroke();
				
		for (var i=0; i<this.APiece.length; i++) {			
			var X = this.getX2Canvas(this.APiece[i].getX()) - this.nWPiece/2;
			var Y = this.getY2Canvas(this.APiece[i].getY()) - this.nHPiece/2;
			context.drawImage(this.APiece[i].getImage(), X, Y, this.nWPiece, this.nHPiece);
		}
		
	}
}