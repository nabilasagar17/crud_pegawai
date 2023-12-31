USE [master]
GO
/****** Object:  Database [DB_PEGAWAI]    Script Date: 24/10/2023 18:12:52 ******/
CREATE DATABASE [DB_PEGAWAI]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'DB_PEGAWAI', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.MSSQLSERVER\MSSQL\DATA\DB_PEGAWAI.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'DB_PEGAWAI_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.MSSQLSERVER\MSSQL\DATA\DB_PEGAWAI_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [DB_PEGAWAI].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [DB_PEGAWAI] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET ARITHABORT OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [DB_PEGAWAI] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [DB_PEGAWAI] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET  DISABLE_BROKER 
GO
ALTER DATABASE [DB_PEGAWAI] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [DB_PEGAWAI] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET RECOVERY FULL 
GO
ALTER DATABASE [DB_PEGAWAI] SET  MULTI_USER 
GO
ALTER DATABASE [DB_PEGAWAI] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [DB_PEGAWAI] SET DB_CHAINING OFF 
GO
ALTER DATABASE [DB_PEGAWAI] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [DB_PEGAWAI] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [DB_PEGAWAI] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [DB_PEGAWAI] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
EXEC sys.sp_db_vardecimal_storage_format N'DB_PEGAWAI', N'ON'
GO
ALTER DATABASE [DB_PEGAWAI] SET QUERY_STORE = ON
GO
ALTER DATABASE [DB_PEGAWAI] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [DB_PEGAWAI]
GO
/****** Object:  Table [dbo].[T_KECAMATAN]    Script Date: 24/10/2023 18:12:52 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[T_KECAMATAN](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[kode] [nchar](10) NULL,
	[id_provinsi] [int] NULL,
	[nama] [varchar](100) NULL,
	[is_active] [tinyint] NULL,
	[created_at] [datetime] NULL,
	[created_by] [varchar](30) NULL,
	[updated_at] [datetime] NULL,
	[updated_by] [varchar](30) NULL,
 CONSTRAINT [PK_T_KECAMATAN] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[T_PROVINSI]    Script Date: 24/10/2023 18:12:52 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[T_PROVINSI](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[kode] [nchar](10) NULL,
	[nama] [varchar](100) NULL,
	[created_at] [datetime] NULL,
	[created_by] [varchar](30) NULL,
	[updated_at] [datetime] NULL,
	[updated_by] [varchar](30) NULL,
	[is_active] [tinyint] NULL,
 CONSTRAINT [PK_T_PROVINSI] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  View [dbo].[view_kecamatan]    Script Date: 24/10/2023 18:12:52 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create view [dbo].[view_kecamatan] as select T_KECAMATAN.* ,T_PROVINSI.kode as kode_provinsi, T_PROVINSI.nama as nama_provinsi from T_KECAMATAN inner join T_PROVINSI on T_PROVINSI.id = T_KECAMATAN.id_provinsi
GO
/****** Object:  Table [dbo].[T_KELURAHAN]    Script Date: 24/10/2023 18:12:52 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[T_KELURAHAN](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[kode] [nchar](10) NULL,
	[id_kecamatan] [int] NULL,
	[id_provinsi] [int] NULL,
	[nama] [varchar](100) NULL,
	[keterangan] [text] NULL,
	[is_active] [tinyint] NULL,
	[created_at] [datetime] NULL,
	[created_by] [varchar](30) NULL,
	[updated_at] [datetime] NULL,
	[updated_by] [varchar](30) NULL,
 CONSTRAINT [PK_T_KELURAHAN] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  View [dbo].[view_kelurahan]    Script Date: 24/10/2023 18:12:52 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
  CREATE view [dbo].[view_kelurahan] as select T_KELURAHAN.* ,T_KECAMATAN.kode as kode_kecamatan, T_KECAMATAN.nama as nama_kecamatan,
T_PROVINSI.kode as kode_provinsi, T_provinsi.nama as nama_provinsi
from T_KELURAHAN 
inner join T_KECAMATAN on T_KECAMATAN.id = T_KELURAHAN.id_kecamatan
inner join T_PROVINSI on T_PROVINSI.id = T_KELURAHAN.id_provinsi
GO
/****** Object:  Table [dbo].[T_PEGAWAI]    Script Date: 24/10/2023 18:12:52 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[T_PEGAWAI](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[kode] [nchar](10) NULL,
	[nama] [varchar](100) NULL,
	[tempat_lahir] [varchar](100) NULL,
	[tgl_lahir] [datetime] NULL,
	[jk] [varchar](15) NULL,
	[agama] [varchar](30) NULL,
	[alamat] [text] NULL,
	[id_kelurahan] [int] NULL,
	[id_kecamatan] [int] NULL,
	[id_provinsi] [int] NULL,
	[path_photo] [varchar](100) NULL,
	[is_active] [tinyint] NULL,
	[created_at] [datetime] NULL,
	[created_by] [varchar](50) NULL,
	[updated_by] [varchar](50) NULL,
	[updated_at] [datetime] NULL,
 CONSTRAINT [PK_T_PEGAWAI] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  View [dbo].[view_pegawai]    Script Date: 24/10/2023 18:12:52 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE view [dbo].[view_pegawai] as SELECT dbo.T_PEGAWAI.id, dbo.T_PEGAWAI.is_active, dbo.T_PEGAWAI.created_at, dbo.T_PEGAWAI.created_by, dbo.T_PEGAWAI.updated_at, dbo.T_PEGAWAI.updated_by,  dbo.T_PEGAWAI.kode, dbo.T_PEGAWAI.nama, 
                  dbo.T_PEGAWAI.tempat_lahir, dbo.T_PEGAWAI.tgl_lahir, dbo.T_PEGAWAI.jk, dbo.T_PEGAWAI.agama, dbo.T_PEGAWAI.alamat, dbo.T_PEGAWAI.id_kelurahan, dbo.T_PEGAWAI.id_kecamatan, dbo.T_PEGAWAI.id_provinsi, 
                  dbo.T_PEGAWAI.path_photo,  dbo.view_kelurahan.kode AS kode_kelurahan, dbo.view_kelurahan.nama AS nama_kelurahan, dbo.view_kelurahan.kode_provinsi AS kode_provinsi, 
                  dbo.view_kelurahan.nama_provinsi AS nama_provinsi, dbo.view_kelurahan.kode_kecamatan AS kode_kecamatan, dbo.view_kelurahan.nama_kecamatan AS nama_kecamatan
FROM     dbo.T_PEGAWAI left JOIN
                  dbo.view_kelurahan ON dbo.view_kelurahan.id = dbo.T_PEGAWAI.id_kelurahan
GO
SET IDENTITY_INSERT [dbo].[T_KECAMATAN] ON 

INSERT [dbo].[T_KECAMATAN] ([id], [kode], [id_provinsi], [nama], [is_active], [created_at], [created_by], [updated_at], [updated_by]) VALUES (2, N'K002      ', 2, N'Cakung Timur', 1, CAST(N'2023-10-24T09:36:22.950' AS DateTime), N'admin', NULL, NULL)
SET IDENTITY_INSERT [dbo].[T_KECAMATAN] OFF
GO
SET IDENTITY_INSERT [dbo].[T_KELURAHAN] ON 

INSERT [dbo].[T_KELURAHAN] ([id], [kode], [id_kecamatan], [id_provinsi], [nama], [keterangan], [is_active], [created_at], [created_by], [updated_at], [updated_by]) VALUES (1, N'L002      ', 2, 2, N'Ujung Mentengs', NULL, 1, CAST(N'2023-10-24T09:38:23.430' AS DateTime), N'admin', CAST(N'2023-10-24T09:44:37.920' AS DateTime), N'admin')
SET IDENTITY_INSERT [dbo].[T_KELURAHAN] OFF
GO
SET IDENTITY_INSERT [dbo].[T_PEGAWAI] ON 

INSERT [dbo].[T_PEGAWAI] ([id], [kode], [nama], [tempat_lahir], [tgl_lahir], [jk], [agama], [alamat], [id_kelurahan], [id_kecamatan], [id_provinsi], [path_photo], [is_active], [created_at], [created_by], [updated_by], [updated_at]) VALUES (1, N'C3        ', N'AUDREY FAUSTINA', NULL, NULL, NULL, N'Islam', N'Jln.Perintis Gg.Mesjid No.188 Bandar Khalipah', NULL, 1, 2, NULL, NULL, CAST(N'2023-10-24T09:54:34.413' AS DateTime), N'admin', NULL, NULL)
INSERT [dbo].[T_PEGAWAI] ([id], [kode], [nama], [tempat_lahir], [tgl_lahir], [jk], [agama], [alamat], [id_kelurahan], [id_kecamatan], [id_provinsi], [path_photo], [is_active], [created_at], [created_by], [updated_by], [updated_at]) VALUES (2, N'C3        ', N'AUDREY FAUSTINA', N'PEMATANG SIMALUNGUN', NULL, NULL, N'Islam', N'Jln.Perintis Gg.Mesjid No.188 Bandar Khalipah', 1, 2, 2, NULL, 1, CAST(N'2023-10-24T09:54:47.633' AS DateTime), N'admin', N'admin', CAST(N'2023-10-24T10:04:52.583' AS DateTime))
INSERT [dbo].[T_PEGAWAI] ([id], [kode], [nama], [tempat_lahir], [tgl_lahir], [jk], [agama], [alamat], [id_kelurahan], [id_kecamatan], [id_provinsi], [path_photo], [is_active], [created_at], [created_by], [updated_by], [updated_at]) VALUES (3, N'C322      ', N'AUDREY FAUSTINA', N'Pematang Simalungun', NULL, N'Wanita', N'Islam', N'Medan', 1, 2, 2, NULL, 1, CAST(N'2023-10-24T09:55:32.403' AS DateTime), N'admin', N'admin', CAST(N'2023-10-24T10:13:40.350' AS DateTime))
SET IDENTITY_INSERT [dbo].[T_PEGAWAI] OFF
GO
SET IDENTITY_INSERT [dbo].[T_PROVINSI] ON 

INSERT [dbo].[T_PROVINSI] ([id], [kode], [nama], [created_at], [created_by], [updated_at], [updated_by], [is_active]) VALUES (2, N'P002      ', N'Acehs', CAST(N'2023-10-24T09:22:15.053' AS DateTime), N'admin', CAST(N'2023-10-24T09:22:26.573' AS DateTime), N'Admin', NULL)
SET IDENTITY_INSERT [dbo].[T_PROVINSI] OFF
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPane1', @value=N'[0E232FF0-B466-11cf-A24F-00AA00A3EFFF, 1.00]
Begin DesignProperties = 
   Begin PaneConfigurations = 
      Begin PaneConfiguration = 0
         NumPanes = 4
         Configuration = "(H (1[40] 4[20] 2[20] 3) )"
      End
      Begin PaneConfiguration = 1
         NumPanes = 3
         Configuration = "(H (1 [50] 4 [25] 3))"
      End
      Begin PaneConfiguration = 2
         NumPanes = 3
         Configuration = "(H (1 [50] 2 [25] 3))"
      End
      Begin PaneConfiguration = 3
         NumPanes = 3
         Configuration = "(H (4 [30] 2 [40] 3))"
      End
      Begin PaneConfiguration = 4
         NumPanes = 2
         Configuration = "(H (1 [56] 3))"
      End
      Begin PaneConfiguration = 5
         NumPanes = 2
         Configuration = "(H (2 [66] 3))"
      End
      Begin PaneConfiguration = 6
         NumPanes = 2
         Configuration = "(H (4 [50] 3))"
      End
      Begin PaneConfiguration = 7
         NumPanes = 1
         Configuration = "(V (3))"
      End
      Begin PaneConfiguration = 8
         NumPanes = 3
         Configuration = "(H (1[56] 4[18] 2) )"
      End
      Begin PaneConfiguration = 9
         NumPanes = 2
         Configuration = "(H (1 [75] 4))"
      End
      Begin PaneConfiguration = 10
         NumPanes = 2
         Configuration = "(H (1[66] 2) )"
      End
      Begin PaneConfiguration = 11
         NumPanes = 2
         Configuration = "(H (4 [60] 2))"
      End
      Begin PaneConfiguration = 12
         NumPanes = 1
         Configuration = "(H (1) )"
      End
      Begin PaneConfiguration = 13
         NumPanes = 1
         Configuration = "(V (4))"
      End
      Begin PaneConfiguration = 14
         NumPanes = 1
         Configuration = "(V (2))"
      End
      ActivePaneConfig = 0
   End
   Begin DiagramPane = 
      Begin Origin = 
         Top = 0
         Left = 0
      End
      Begin Tables = 
         Begin Table = "view_kelurahan"
            Begin Extent = 
               Top = 175
               Left = 48
               Bottom = 338
               Right = 258
            End
            DisplayFlags = 280
            TopColumn = 0
         End
         Begin Table = "T_PEGAWAI"
            Begin Extent = 
               Top = 7
               Left = 48
               Bottom = 170
               Right = 242
            End
            DisplayFlags = 280
            TopColumn = 0
         End
      End
   End
   Begin SQLPane = 
   End
   Begin DataPane = 
      Begin ParameterDefaults = ""
      End
      Begin ColumnWidths = 20
         Width = 284
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
         Width = 1200
      End
   End
   Begin CriteriaPane = 
      Begin ColumnWidths = 11
         Column = 1440
         Alias = 900
         Table = 1170
         Output = 720
         Append = 1400
         NewValue = 1170
         SortType = 1350
         SortOrder = 1410
         GroupBy = 1350
         Filter = 1350
         Or = 1350
         Or = 1350
         Or = 1350
      End
   End
End
' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'view_pegawai'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPaneCount', @value=1 , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'view_pegawai'
GO
USE [master]
GO
ALTER DATABASE [DB_PEGAWAI] SET  READ_WRITE 
GO
