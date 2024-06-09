import {UUID} from "crypto";

export interface Product {
    id: UUID;
    name: string;
    description?: string;
    created_at: string;
    updated_at: string;
}
